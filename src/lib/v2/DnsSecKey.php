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

class DnsSecKey extends v2\DnsSecKey implements ApiObjectInterface {
    /**
     *  model\DnsSecKey $db The Database
     */
    public $db;
    private $old;
        /**
     * @var DbProperties $properties
     */
    public $properties;
    public function __construct($CreDate=null, $ExpDate=null)
    {
        $this->properties  = new DbProperties($this);
        $this->db = new model\DnsSecKey();
        $this->db->setObject($this);
    }
    
    /**
     * Get the Domain-Data via API
     * @param string if null, $this->handle is used
     */
    public function get($handle=null)  : DnsSecKey {
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
     * @return ApiObjectInterface|null 
     */
    public function getApi($handle=null)  : \ascio\v2\DnsSecKey {
        $handle = $handle ?  $handle : $this->getHandle();
        assert($handle, new \Exception("Please provide a handle"));
        $dnsSecKey =  Ascio::getClientV2()->GetDnsSecKey(new v2\GetDnsSecKey(0,$handle));
        $this->old = clone $dnsSecKey;
        Tools::mergeProperties($dnsSecKey,$this);
        return $dnsSecKey->getDnsSecKey();
     } 
      /**
      * Get the Data via API
      * @param string|null $handle if null, $this->handle is used
      * @return ApiObjectInterface|null 
      */
     public function getDb($handle=null) : DnsSecKey {
         $handle = $handle ?  $handle : $this->getHandle();
         assert($handle, new \Exception("Please provide a handle"));
         return $this->db->getDb();
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

