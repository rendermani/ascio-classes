<?php
namespace ascio\lib\v2;
use ascio\v2;
use ascio\lib\Ascio;
use ascio\lib\Tools;
use ascio\lib\Actions;
use ascio\lib\DbProperties;
use ascio\model\v2 as model;
use ascio\lib\ApiObjectInterface;
use ascio\lib\AscioException;
use ascio\lib\AscioOrderExceptionV2;
use ascio\v3\OrderStatusType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\workflows\Workflow;
use ascio\model\common\WorkflowModel;
use ascio\workflows\WorkflowStep;
use ascio\model\v2\Order as OrderModel;


class Order extends v2\Order implements ApiObjectInterface{
    /**
     * @var  $actions Actions to be performed when a new Status is receive. Extend the ActionClass for own Actions. 
     */
    private $actions;
    /**
     * @var model\Order $db The Database
     */
    public $db;
    /**
     * @var DbProperties $properties
     */
    public $properties;
    public $Code;     
    public $Message;     
    public $Errors;     
    public function __construct($Type=null, $Status=null)
    {
        $this->properties  = new DbProperties($this);   
        $this->properties->add("Message","TEXT");
        $this->properties->add("Errors");
        $this->properties->add("Code","int",4);
        $this->Type = $Type ? $Type : v2\OrderType::NotSet;
        $this->Status = $Status ? $Status : v2\OrderStatusType::NotSet;
        $this->actions = new Actions();
        $this->db = new model\Order();
        $this->db->setObject($this);
    }
    /**
     * Repeating poll of an order. Uses the GetOrder method
     * @param int $repeatDelaySeconds polls every x seconds
     */
    public function poll($repeatDelaySeconds=1) {
        assert($repeatDelaySeconds >= 1, new \Exception("Please provice a delay that is  >= 1s"));        
        $this->getDb();
        while(true) {   
           if($this->pollOrder()) {
               return;
            }           
           sleep($repeatDelaySeconds);
        }
    }
    public function pollOrder() {
       
    }
    public function ack() {
        return Ascio::getClientV2()->AckMessage(new v2\AckMessage(0,$this->getOrderId()));
    }
    public function receiveHttpCallback() {
        
    }
    public function create() : ?Order {
        $this->setCreDate(new \DateTime("now"));
        $this->properties->set("Code",100); 
        $this->db->saveObject();
        $this->getDomain()->deleteTemporaryHandles();
        Tools::debug($this->getType()." - ".$this->getDomain()->getDomainName().": Sending to the API");
        if($this->db->active($this->getDomain()->getDomainName())) {
            return new OrderQueueResponse($this);
        }
        try {
            $this->db->updateStatus(["code" => 150]);
            $result = Ascio::getClientV2()->CreateOrder(new v2\CreateOrder(0,$this));        
            $this->orderResult = $result;
            Tools::merge($result->getOrder(),$this);  
            
            $status = $result->getCreateOrderResult();
            $this->properties->set("Message",$status->getMessage()); 
            $this->message = $status->getMessage();
            $this->properties->set("Code",$status->getResultCode()); 
            $this->Code = $status->getResultCode();
            $this->setStatus($result->getOrder()->getStatus());
            Tools::debug($this->getType()." - ".$this->getOrderId().", ".$this->getDomain()->getDomainName().": Sent to the API");            
            Tools::relinkHandles($this);             
            $this->db->saveObject();
        } catch (AscioOrderExceptionV2 $e) {
            // failed order will be written to the database
            $this->properties->set("Message",$e->getMessage()); 
            $this->message = $e->getMessage();
            $this->properties->set("Code",$e->getCode()); 
            $this->Code = $e->getCode();
            $this->properties->set("Errors",json_encode($e->getErrors())); 
            $this->errors = $e->getErrors();
            $this->setOrderId($e->getOrder()->getOrderId());      
            $this->setStatus(OrderStatusType::Invalid);                       
            $this->db->saveObject();
            Tools::debug($this->getType()." - ".$this->getOrderId().", ".$this->getDomain()->getDomainName().": ".$e->getMessage());
            throw $e;
        }       
        
        return $this;              
    }
    function createQueued($domainName) : ?Order {
        $model = new OrderModel();
        if(!$model->active($domainName)) {
            try {
                $order = new Order();
                $order->db->next($domainName);
                Tools::merge($model->getAttributes(),$order);
                return $order->create();
            } catch (ModelNotFoundException $e) {
                try {
                    $order = new Order();
                    $order->db->next();
                    $order->getDb();
                    Tools::merge($model->getAttributes(),$order);
                    return $order->create();
                } catch (ModelNotFoundException $e) {
                    return null;
                }
            }
        }
    }
    function validate(v2\OrderType $type) : v2\ValidateOrderResponse {
        $result = Ascio::getClientV2()->ValidateOrder(new v2\ValidateOrder(0,$this));     
        return $result;              
    }
    public function getResult() : v2\CreateOrderResponse {
        return $this->orderResult;
    }
    public function writeDb() {

    }
    public function readDb() {

    }
    public function getMessages() {
        //TODO:: Get from DB
    }
    /**
     * @param  $actions Action-Class to be performed when a new Status is receive. Extend the "ascio\lib\Actions" for own Actions. 
     */
    public function setActions($className = null) {
        if(!$className) {
            $this->actions = new Actions();
        } else {
            $this->actions = new $className();
        }        
    }
    public function getActions() {
        if(!$this->actions) return false;
        return get_class($this->actions);
    }
        /**
     * Get the value of Handle
     */ 
    public function getHandle() {
        return $this->getOrderId();
    }
    /**
     * Set the value of Handle
     *
     * @return  self
     */ 
    public function setHandle($handle) : void
    {
        $this->setOrderId($handle);
    }
      /**
     * Get the Domain-Data via DB or API API
     * @param string $orderId Can use a handle or domain-name. Using a domain-name is slower. if null, $this->handle is used
     */
    public function get($orderId=null) : Order  {
        try {
            return $this->getDb($orderId);
        } catch(ModelNotFEoundException  $e) {
            return $this->getApi($orderId); 
        }  catch (QueryException $e) {
            return $this->getApi($orderId); 
        }
    } 
    /**
     * Get the Data via Db or API
     * @param string $handle if null, $this->handle is used
     * @return ApiObjectInterface 
     */        
    public function getDb($handle=null) : Order  {
        $handle = $handle ? $handle : $this->getHandle(); 
        assert(isset($handle),new \Exception('Please provide a Handle, or use $this->setHandle()'));
        $this->db->getDb($handle);      
        return $this;        
    }
    /**
     * Get the Domain-Data via API
     * @param string $orderId Can use a handle or domain-name. Using a domain-name is slower. if null, $this->handle is used
     */
    public function getApi($orderId=null) : Order  {
        $orderId = $orderId ? $orderId : $this->getOrderId();
        assert(isset($orderId),new \Exception('Please provide an OrderId use $this->setOrderId() '));
        $result = Ascio::getClientV2()->GetOrder(new v2\GetOrder(0,$orderId));
        Tools::merge($result->getOrder(),$this); 
        $this->db->setObject($this);     
        $this->db->saveObject();           
        return $this;
    }

    /**
     * Get the Domain-Data via API
     */
    public function sync() : void  {
        $this->db->sync();
    } 
    /**
    * Get the DB Properties
    * @return DbProperties
    */
    public function getProperties() : ?DbProperties {
        return $this->properties;
    }  
}
class OrderQueueResponse {
    private $order;
    function __construct($order)
    {
        $this->setOrder($order);   
    }

    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }
}