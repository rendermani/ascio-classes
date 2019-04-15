<?php
namespace ascio\base;
use Illuminate\Database\Eloquent\Model;
use ascio\lib\Ascio;
use ascio\base\BaseConnectorInterface;
use Illuminate\Contracts\Queue\QueueableCollection;
use ascio\v2\GetOrder;

class DbBase extends Model implements BaseConnectorInterface {    
    // TODO: use Lavarel relations
    // TODO: define scopes 
    protected $jsonAttributes = [];
    protected $handle;
    protected $prefix;
    protected $link = [
        "from" => ["table"=>"Domains","field"=>"PrivacyProxy"],
        "to" => ["table"=>"PrivacyProxy","field"=>"DomainHandle"]
    ];
    protected $linkedHandles = ["Registrant","AdminContact"];
    /**
     * @var Link $linkObject
     */
    private $linkObject;
    private $apiObject;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->prefix = Ascio::getConfig()->db->tablePrefix;
        $this->linkObject = new Link($this->link);
    }
    public function getLink() : Link {
        return $this->linkObject;
    }
    public function saveDeep() {
        $this->saveOrFail();
        foreach($this->getApiObjects() as $key => $obj) {           
            $obj->saveDeep();
        }
    }
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
    public function fromParent(DbBase $parent) {
        $to = $parent->getLink()->getTo();      
        $this->query()->where($to->getField(),$parent->getKey());
        $this->parent = $this;
    }  
    public function hasDb() {
        return true;
    }  
    public function setTablePrefix($prefix) {
        $this->prefix  = $prefix; 
    }
}
class ArrayBaseDb implements BaseConnectorInterface {    
    //TODO: Implement as Lavarel-Collections
    protected $jsonAttributes = [];
    protected $handle;
    protected $prefix;
    protected $link = [
        "from" => ["table"=>"Domains","field"=>"PrivacyProxy"],
        "to" => ["table"=>"PrivacyProxy","field"=>"DomainHandle"]
    ];
    protected $linkedHandles = ["Registrant","AdminContact"];
    /**
     * @var Link $linkObject
     */
    private $linkObject;
    private $apiObject;
    //TODO: Get: get list of children. Put: store children. 
    public function get() {

    }
    public function save() {
        
    }
    public function delete() {
        
    }
    public function update () {
        
    }
}
