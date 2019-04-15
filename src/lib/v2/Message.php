<?php
namespace ascio\lib\v2;
use ascio\v2;
use ascio\lib\Tools;
use ascio\model\v2 as model;
use ascio\lib\DbProperties;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Schema\Blueprint;


class Message extends v2\Message {
    /**
     * model\Message $db The Database
     */
    public $db;
    private $old;
    private $orderId;
    private $id;
    public $reuseHandles = true;
    /**
     * @var DbProperties $properties
     */
    public $properties;
    public function __construct($CreDate=null, $ExpDate=null)
    {
        $this->properties  = new DbProperties($this);
        $this->properties->add("Id","int",5);
        $this->db = new model\Message();
        $this->db->setObject($this);
    }
    /**
     * Get the Data via Db or API
     * @param string $handle if null, $this->handle is used
     * @return Message 
     */
    public function get($handle=null) : Message   {
        try {
            return $this->getDb($handle);
        } catch(ModelNotFoundException  $e) {
            return $this->getApi($handle); 
        } catch (QueryException $e) {
            return $this->getApi($handle); 
        }     
     } 
     public function save() {
        //OPTIMIZE Create Migration Class
        assert($this->getOrderId() != null, new \Exception("Please provide an OrderId"));
        $this->createTable();
        $this->db->where("OrderId",$this->getOrderId())->delete();        
        foreach(Tools::getProperties($this)  as $key => $value) {
            $this->db->setRawAttributes(Tools::getProperties($this));
        }

        $this->db->setAttribute("Attachments",null);
        $this->db->saveOrFail();
        $this->setAttachments($this->saveAttachments());
     }
     private function saveAttachments() {
        if(!$this->getAttachments()) return;
        $attachments = $this->getAttachments()->getAttachment();
        foreach($attachments as $key => $attachment) {
            /**
             * @var $attachment Attachment
             */
            $attachment->__construct();
            $attachment->setMsgId($this->db->getAttribute("Id"));
            $attachment->setOrderId($this->getOrderId());
            $attachment->createTable();
            $attachment->setOrderId($this->getOrderId());
            $attachment->db->setRawAttributes(Tools::getProperties($attachment));
            $attachment->db->saveOrFail();
            
        }

     }
    /**
     * Get the Data via API
     * @param string|null $handle if null, $this->handle is used
     * @return Message 
     */
    public function getApi($handle=null)   {
       // can't get a single message
    } 
     /**
     * Get the Data via API
     * @param string|null $handle if null, $this->handle is used
     * @return Message 
     */
    public function getDb($handle=null) : Message {
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
    private function createTable() {
        if(!Capsule::Schema()->hasTable('v2_Message')) {
            Capsule::Schema()->create('v2_Message',function(Blueprint $table) {
                $table->increments('Id');
                $table->string('OrderId')->index();
                $table->binary('Attachments')->nullable();
                $table->text('Body')->nullable();
                $table->dateTime('Created')->index();
                $table->string('FromAddress')->index();
                $table->string('ToAddress')->index();
                $table->string('Subject');
                $table->string('Type')->index();
                $table->timestamps();
            });
        }
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

