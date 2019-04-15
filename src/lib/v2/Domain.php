<?php
namespace ascio\lib\v2;
use ascio\v2;
use ascio\lib\Ascio;
use ascio\lib\Tools;
use ascio\model\v2 as model;
use ascio\lib\v2\Order;
use ascio\lib\LockType;
use ascio\lib\Actions;
use ascio\lib\Db;
use ascio\lib\DbProperties;
use ascio\lib\ApiObjectInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\QueryException;
use ascio\v2\CreateOrderResponse ;
use ascio\v2\CreateOrder;
use ascio\v2\Response;
use ascio\v2\OrderStatusType;
use ascio\v2\OrderType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\lib\AscioException;

class Domain extends v2\Domain implements ApiObjectInterface {
    /**
     * @var model\Domain $db The Database
     */
    public $db;
    private $locksChanged; 
    /**
     * @var DbProperties $properties
     */
    public $properties;
    public function __construct($CreDate=null, $ExpDate=null)
    {
        $this->properties  = new DbProperties($this);
        $this->setCreDate(new \DateTime());
        $this->setExpDate(new \DateTime());
        $this->db = new model\Domain();
        $this->db->setObject($this);        
    } 
    public function hasLock($type) : bool {
        return strpos($this->getStatus(),$type) !== false;
    }
    public function changeLocks(?Actions $actions = null) : CreateOrderResponse {
        $order = new Order(v2\OrderType::Change_Locks);
        if(!$this->locksChanged) {
            $status  = new Response();
            $status->setResultCode(200);
            $order = new Order(OrderType::Change_Locks ,OrderStatusType::Completed);
            return  new CreateOrderResponse($status,$order);
        } 
        $order->setDomain($this);
        return $order->create()->getResult();
    }
    public function getDeleteLock()
    {
        return $this->hasLock(LockType::Delete) ? "Lock" : "Unlock";
    }
    public function getUpdateLock()
    {
        return $this->hasLock(LockType::Update) ? "Lock" : "Unlock";
    }
    public function getTransferLock()
    {
        $lock = $this->hasLock(LockType::Transfer) ? "Lock" : "Unlock";
    }
    public function setDeleteLock($locked)
    {
        $lockAction = $locked ? "Lock" : "Unlock";
        $oldLock =  $this->hasLock(LockType::Delete) ? "Lock" : "Unlock";
        if($lockAction !== $oldLock) {
            $this->locksChanged = true; 
            parent::setDeleteLock($lockAction);
        }
    }
    public function setUpdateLock($locked)
    {
        $lockAction = $locked ? "Lock" : "Unlock";
        $oldLock =  $this->hasLock(LockType::Update) ? "Lock" : "Unlock";
        if($lockAction !== $oldLock) {
            $this->locksChanged = true; 
            parent::setUpdateLock($lockAction);
        }
    }
    public function setTransferLock($locked)
    {
        $lockAction = $locked ? "Lock" : "Unlock";
        $oldLock =  $this->hasLock(LockType::Transfer) ? "Lock" : "Unlock";
        if($lockAction !== $oldLock) {
            $this->locksChanged = true; 
            parent::setTransferLock($lockAction);
        }
    }
    public function register() : Order {
        $order = new Order(v2\OrderType::Register_Domain);
        $order->setDomain($this);
        return $order->create();
    }
    public function transfer() : Order{
        $order = new Order(v2\OrderType::Transfer_Domain);
        $order->setDomain($this);
        return $order->create();
    }
    public function deleteTemporaryHandles($object = null) {
        $object = $object ? $object : $this; 
        $key = $object->db->getPrimaryKey();
        $handle = $object->{"get".$key}();
        if(strpos($handle,"_") === 0 ) {
            $object->{"set".$key}(null);
        }

        foreach($object->properties->getObjects() as $key => $subObject) {
            $this->deleteTemporaryHandles($subObject);
        }
    }
    /**
     * Get the value of Handle
     */ 
    public function getHandle() {
        return $this->getDomainHandle();
    }
    /**
     * Set the value of Handle
     *
     * @return  self
     */ 
    public function setHandle($handle) : void
    {
        $this->setDomainHandle($handle);
    }
    /**
     * Get the Domain-Data via DB or API API
     * @param string $handleOrDomainName Can use a handle or domain-name. Using a domain-name is slower. if null, $this->handle is used
     */
    public function get($handleOrDomainName=null) : Domain   {
        try {
            return $this->getDb($handleOrDomainName);
        } catch(ModelNotFoundException  $e) {
            return $this->getApi($handleOrDomainName); 
        }  catch (QueryException $e) {
            return $this->getApi($handleOrDomainName); 
        }
    } 
    /**
     * Get the Data via Db or API
     * @param string $handle if null, $this->handle is used
     * @return Domain 
     */        
    public function getDb($handleOrDomainName=null) : Domain   {
        $handleOrDomainName = $handleOrDomainName ? $handleOrDomainName : $this->getDomainHandle(); 
        assert(isset($handleOrDomainName),new \Exception('Please provide a DomainName, Handle, or use $this->setDomainHandle()'));
        $domain = $this->db->domain($handleOrDomainName)->firstOrFail();
        Tools::mergeProperties($domain->getAttributes(),$this);
        return $this;        
    }
    /**
     * Get the Domain-Data via API
     * @param string $handleOrDomainName Can use a handle or domain-name. Using a domain-name is slower. if null, $this->handle is used
     */
    public function getApi($handleOrDomainName=null) : Domain   {
        $handleOrDomainName = $handleOrDomainName ? $handleOrDomainName : $this->getDomainHandle(); 
        assert(isset($handleOrDomainName),new \Exception('Please provide a DomainName, Handle, or use $this->setDomainHandle()'));
        
        if(\strpos($handleOrDomainName,".")) {    
            // set filters  
            $method = "SearchDomain";      
            $clause = new v2\Clause(v2\SearchOperatorType::Is);
            $clause->setAttribute("DomainName");
            $clause->setValue($handleOrDomainName);                                
            $criteria = new v2\SearchCriteria(v2\SearchModeType::Any);            
            $criteria->setClauses([$clause]);
            $criteria->setWithoutstates(["Deleted"]);
            $searchDomain = new v2\SearchDomain(0,$criteria);
            // search the domain
            $request = $searchDomain;
            $result = Ascio::getClientV2()->SearchDomain($searchDomain);
            $status = $result->getSearchDomainResult();
            $domain = $result->getDomains()->getDomain()[0];
        } else {
            $method = "'GetDomain";
            $request = $handleOrDomainName;
            $result = Ascio::getClientV2()->GetDomain(new v2\GetDomain(0,$handleOrDomainName));
            $status = $result->getGetDomainResult();
            $domain = $result->getDomain();
        }  
        if(!$domain) {
            $e = new AscioException("Domain ".$handleOrDomainName. " does not exist on the partner-account.",404) ;        
            $e->setResult($method,$request,$status,$result);
            throw $e;
        } 
        /*
        Tools::mergeProperties($domain,$this);
        Tools::debugHandles($this,"Domain after merge");
        Tools::initObjects($this); 
        Tools::debugHandles($this,"Domain after init");     
        $this->db->setObject($this);  
        Tools::debugHandles($this,"Domain before save");   
        $this->properties = new DbProperties($this);   */     
        Tools::merge($domain,$this);
        $this->db->saveObject();         
        Tools::debugHandles($this,"Domain after save");  
        return $this;
    }
    /**
     * Sync the Data with the Database
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

