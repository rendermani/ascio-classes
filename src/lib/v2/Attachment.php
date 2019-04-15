<?php
namespace ascio\lib\v2;
use ascio\v2;
use ascio\lib\Tools;
use ascio\model\v2 as model;
use ascio\lib\DbProperties;
use ascio\lib\ApiObjectInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Schema\Blueprint;


class Attachment extends v2\Attachment  {
    /**
     * model\Attachment $db The Database
     */
    public $db;
    private $old;
    private $msgId;
    private $handle;
    private $orderId; 
        /**
     * @var DbProperties $properties
     */
    public $properties;
    protected $Handle;
    public function __construct($CreDate=null, $ExpDate=null)
    {
        $this->properties  = new DbProperties($this);
        $this->properties->add("MsgId","int",8);
        $this->db = new model\Attachment();
        $this->db->setObject($this);
    }
      /**
     * Get the Data via Db or API
     * @param string $handle if null, $this->handle is used
     * @return Attachment 
     */
    public function get($handle=null) : Attachment   {
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
     * @return Attachment 
     */
    public function getApi($domainHandle=null) : Attachment  {
        $domainHandle = $domainHandle ?  $domainHandle : $this->getHandle();
        assert($domainHandle, new \Exception("Please provide a handle"));
        $domain = new Domain();
        $domain->getApi($domainHandle);
        Tools::mergeProperties($domain->getAttachment()(),$this);
        return $this;
    } 
     /**
     * Get the Data via API
     * @param string|null $handle if null, $this->handle is used
     * @return Attachment 
     */
    public function getDb($handle=null) : Attachment {
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
     * Get the value of msgId
     */ 
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * Set the value of msgId
     *
     * @return  self
     */ 
    public function setMsgId($msgId)
    {
        $this->msgId = $msgId;

        return $this;
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }
    public function createTable() {
        if(!Capsule::Schema()->hasTable('v2_Attachment')) {
            Capsule::Schema()->create('v2_Attachment',function(Blueprint $table) {
                $table->increments('Id');
                $table->string('OrderId')->index();
                $table->string('MsgId')->index();
                $table->binary('Data')->nullable();
                $table->text('FileName');
                $table->timestamps();
            });
        }
    }
}


