<?php
namespace ascio\lib\v2;
use ascio\v2;
use ascio\lib\Ascio;
use ascio\lib\Tools;
use ascio\lib\Db;
use ascio\lib\v2\Order;
use ascio\lib\LockType;
use ascio\lib\Actions;
use ascio\model\v2 as model;
use ascio\lib\DbProperties;
use ascio\lib\ApiObjectInterface;

class Registrant extends v2\Registrant implements ApiObjectInterface {
    /**
     * model\Registrant $db The Database
     */
    public $db;
    private $old;
    public $reuseHandles = true;    
        /**
     * @var DbProperties $properties
     */
    public $properties;
    public function __construct($CreDate=null, $ExpDate=null)
    {
        $this->properties  = new DbProperties($this);
        if(!$this->getCreDate()) {
            $this->setCreDate(new \DateTime());
        }
        $this->db = new model\Registrant();
        $this->db->setObject($this);
    }
    
    /**
     * Get the Data via Db or API
     * @param string $handle if null, $this->handle is used
     * @return Registrant 
     */
    public function get($handle=null) : Registrant   {
        try {
            return $this->getDb($handle);
        } catch(ModelNotFoundException  $e) {
            return $this->getApi($handle); 
        } catch (QueryException $e) {
            return $this->getApi($handle); 
        }     
     } 

    /**
     * Get the Data via API
     * @param string|null $handle if null, $this->handle is used
     * @return Registrant 
     */
    public function getApi($handle=null) : Registrant  {
       $handle = $handle ?  $handle : $this->getHandle();
       assert($handle, new \Exception("Please provide a handle"));
       $registrant =  Ascio::getClientV2()->GetRegistrant(new v2\GetRegistrant(0,$handle));
       $this->old = clone $registrant; 
       Tools::mergeProperties($registrant,$this);
       return $this;
    } 
     /**
     * Get the Data via API
     * @param string|null $handle if null, $this->handle is used
     * @return Registrant 
     */
    public function getDb($handle=null) : Registrant {
        $handle = $handle ?  $handle : $this->getHandle();
        assert($handle, new \Exception("Please provide a handle"));
        return $this->db->getDb($handle);
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

