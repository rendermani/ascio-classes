<?php
namespace ascio\lib\v2\base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\AscioEnvironment;
use ascio\lib\Ascio;
//TODO: new WSDL Generator with XSLT 



class Link {
    protected $from;
    protected $to; 
    public function __construct(array $input) 
    {
        $this->from = new LinkItem($input["from"]["table"],$input["from"]["field"]);
        $this->to =new LinkItem($input["to"]["table"],$input["to"]["field"]);
    }
    public function getFrom() : LinkItem
    {
        return $this->from;
    } 

    public function getTo() : LinkItem
    {
        return $this->to;
    }
}
class LinkItem {
    public $table;
    public $field;
    public function __construct(string $table, string $field) 
    {
        $this->prefix = Ascio::getConfig()->db->tablePrefix;
        $this->field = $field;
        $this->table = $this->prefix . $table; 
    }    
    public function getTable()
    {
        return $this->table;
    }
    public function getField()
    {
        return $this->field;
    }
}
Interface V2BaseInterface {    
    public function getApiAttributes();
    public function createApi();
    public function updateApi();
    public function initApi();
    public function getHandle();
    public function setHandle();
    public function getParent();
}

class Base extends Model implements V2BaseInterface {
    protected $apiAttributes  = [];
    protected $handle;
    protected $parent;
    private $apiObj;
    
    public function toArray() {

    }
    public function fromArray() {

    }
    public function getApiAttributes() {
        return $this->apiAttributes;
    }
    public function setApiAttributes() {
        foreach($this->attributes as $key => $value) {
            $this->$key = $value; 
        }
    }
    public function getHandle() {
        return $this->handle;
    }
    public function setHandle($handle) {
        $this->handle = $handle;
        return $this;
    }
    public function updateApi() {
        //TODO: Reverse search of parent/parents and call update. eg. contacts
        throw new AscioEnvironment("Function not implemented. Please update the parent Object");
    }
    public function initApi () {
        foreach($this->getApiObjects() as $key => $value) {
            $value->__construct();
            $value->init();
        }
    }
    public function getApiObjects() : iterable {
        $out = [];
        foreach($this->apiAttributes as $key => $name) {
            if(is_object($this->$name)) {
                $out[$name] = $this->$name;
            }            
        }
        return $out;
    }
    public function hasDb() {
        return false;
    }
    public function getParent() {
        return $this->parent;
    }
    public function api() {
        return new Api();
    }
}   
class Api {
    public function __construct()
    {
        
    }
    public function update() {
        //TODO: Reverse search of parent/parents and call update. eg. contacts
        throw new AscioEnvironment("Function not implemented. Please update the parent Object");
    }
    public function init () {
        foreach($this->getObjects() as $key => $value) {
            $value->__construct();
            $value->init();
        }
    }
    public function getObjects() : iterable {
        $out = [];
        foreach($this->apiAttributes as $key => $name) {
            if(is_object($this->$name)) {
                $out[$name] = $this->$name;
            }            
        }
        return $out;
    }
}

class DbBase extends Base implements V2BaseInterface {    
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
class ArrayBase extends DbBase {
    public function saveDeep() {

    }

}
class DbArrayBase extends DbBase {
    public function saveDeep() {

    }
}

class Domain extends DbBase implements V2BaseInterface {
    protected $handle = "DomainHandle";
    protected $link = [
        "from" => ["table"=>"Order","field"=> "Domain"],
        "to" => ["table"=>"Domain","field"=> "DomainHandle"]
    ];
    public function __construct()
    {        
        $this->table  = $this->prefix . "Domain";
        parent::__construct();
    }
    public function getRegistrant() : Registrant {
        if($this->Registrant) {
            return $this->Registrant;
        } else {
            $this->Registrant = new Registrant();
            $this->Registrant->fromParent($this);
            return $this->Registrant;         
        }       
    }
    public function setRegistrant($registrant) {
        $this->Registrant = $registrant;
        $this->setAttribute("Registrant",$registrant->getHandle());
        return $this;
    }
    public function setDomainName($name) {
        $this->DomainName = $name; 
        $this->attributes[$name] = $name; 
    }
  
}

