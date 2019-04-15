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
use Illuminate\Database\Eloquent\ModelNotFoundException;


class QueueItem extends v2\QueueItem implements ApiObjectInterface {
    /**
     * model\QueueItem $db The Database
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
        $this->db = new model\QueueItem();
        $this->db->setObject($this);
    }
    /**
     * Get the Data via Db or API
     * @param string $handle if null, $this->handle is used
     * @return QueueItem 
     */
    public function get($handle=null) : QueueItem   {
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
     * @return QueueItem 
     */
    public function getApi($handle=null) : QueueItem  {
       $handle = $handle ?  $handle : $this->getHandle();
       assert($handle, new \Exception("Please provide a handle"));
       $queueItem =  Ascio::getClientV2()->GetQueueItem(new v2\GetQueueItem(0,$handle));
       Tools::mergeProperties($queueItem,$this);
       return $this;
    } 
     /**
     * Get the Data via API
     * @param string|null $handle if null, $this->handle is used
     * @return QueueItem 
     */
    public function getDb($handle=null) : QueueItem {
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
    public function getHandle()
    {
        return $this->getMsgId();
    }
    public function setHandle($handle)
    {
        $this->setMsgId($handle);
    }
}

