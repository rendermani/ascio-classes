<?php
namespace ascio\lib\v2;
use ascio\v2;
use ascio\lib\Ascio;
use ascio\lib\Tools;
use ascio\lib\Actions;

class Order extends v2\Order{
    /**
     * @var  $actions Actions to be performed when a new Status is receive. Extend the ActionClass for own Actions. 
     */
    private $actions;
    /**
     * @var v2\Response $orderResult;
     */
    protected $resultOrder;
    /**
     * @var v2\ArrayOfMessage $messages
     */
    public $messages;
    public function __construct($Type=null, $Status=null)
    {
        $this->Type = $Type ? $Type : v2\OrderType::NotSet;
        $this->Status = $Status ? $Status : v2\OrderStatusType::NotSet;
        $this->actions = new Actions();
    }
    /**
     * Repeating poll of an order. Uses the GetOrder method
     * @param int $repeatDelaySeconds polls every x seconds
     */
    public function poll($repeatDelaySeconds=1) {
        assert($repeatDelaySeconds >= 1, new \Exception("Please provice a delay that is  >= 1s"));
        while(true) {            
            $this->get();
            $status = $this->getStatus();
            $this->actions->$status($this);
            $types = [ 
                v2\OrderStatusType::Completed, 
                v2\OrderStatusType::Failed, 
                v2\OrderStatusType::Invalid,
                v2\OrderStatusType::Pending_Documentation,
                v2\OrderStatusType::Pending_End_User_Action
            ];
            if(in_array($this->getStatus(),$types)){
                return;
            }
            sleep($repeatDelaySeconds);
        }
    }
    public function ack() {
        return Ascio::getClientV2()->AckMessage()(new v2\AckMessage(0,$this->getOrderId()));
    }
    public function receiveHttpCallback() {
        
    }
    public function create() : v2\CreateOrderResponse {
        Tools::debug($this->getType()." - ".$this->getDomain()->getDomainName().": Sending to the API");
        $result = Ascio::getClientV2()->CreateOrder(new v2\CreateOrder(0,$this));
        $this->setOrderId($result->getOrder()->getOrderId());
        Tools::debug($this->getType()." - ".$this->getOrderId().", ".$this->getDomain()->getDomainName().": Sent to the API");
        $this->resultOrder = $result->getOrder();
        return $result;              
    }
    public function validate(v2\OrderType $type) : v2\ValidateOrderResponse {
        $result = Ascio::getClientV2()->ValidateOrder(0,new v2\ValidateOrder($this));
        return $result;              
    }
    public function getResult() : v2\Response {
        return $this->orderResult;
    }
    /**
     * @param string $orderId if null $this->getOrderId() will be used;
     */
    public function get($orderId=null) {
        $orderId = $orderId ? $orderId : $this->getOrderId();
        assert(isset($orderId),new \Exception('Please provide an OrderId use $this->setOrderId() '));
        $result = Ascio::getClientV2()->GetOrder(new v2\GetOrder(0,$orderId));
        Tools::mergeProperties($result->getOrder(),$this);
    }
    public function writeDb() {

    }
    public function readDb() {

    }
    public function getMessages() :v2\ArrayOfMessage {
        $this->messages = Ascio::getClientV2()->GetMessages(new v2\GetMessages(0,$this->getOrderId()));
        return $this->messages;
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
    private function propertiesFromOrder(v2\Order $order) {
        foreach(get_class_vars(__CLASS__) as $key => $value) {
            if(property_exists($order,$key)) {
                $getFunction = "get".$key;
                $setFunction = "set".$key;
                $value = $order->$getFunction();
                if(isset($value)) {
                    $this->$setFunction($value);
                }
            }
        }
    }

}