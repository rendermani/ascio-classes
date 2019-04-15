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

class Extensions extends v2\Extensions  implements ApiObjectInterface {
    /**
     * model\NameServer $db The Database
     */
    public $db;
    protected $Id;
        /**
     * @var DbProperties $properties
     */
    public $properties;
    protected $Handle;

    public function __construct($CreDate=null, $ExpDate=null)
    {
        $this->properties  = new DbProperties($this);
        $this->db = new model\Extension();
        $this->db->setObject($this);
    }
    /**
     * Get the value of Handle
     */ 
    public function getHandle()
    {
        return $this->Handle;
    }

    /**
     * Set the value of Handle
     *
     * @return  self
     */ 
    public function setHandle($handle)
    {
        $this->Handle = $handle;

        return $this;
    }
      /**
     * Get the Data via Db or API
     * @param string $handle if null, $this->handle is used
     * @return Extensions 
     */
    public function get($handle=null) : Extensions   {
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
     * @return Extensions 
     */
    public function getApi($domainHandle=null) : Extensions  {
        $domainHandle = $domainHandle ?  $domainHandle : $this->getHandle();
        assert($domainHandle, new \Exception("Please provide a handle"));
        $domain = new Domain();
        $domain->getApi($domainHandle);
        Tools::mergeProperties($domain->getExtensions(),$this);
        return $this;
    } 
     /**
     * Get the Data via API
     * @param string|null $handle if null, $this->handle is used
     * @return Extensions 
     */
    public function getDb($handle=null) : Extensions {
        $handle = $handle ?  $handle : $this->getHandle();
        assert($handle, new \Exception("Please provide a handle"));
        return $this->db->getDb($handle);
     } 
     /**
     * Get the Data via API
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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}

