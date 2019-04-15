<?php
namespace ascio\lib\v2\base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\AscioEnvironment;
use ascio\lib\Ascio;
//TODO: new WSDL Generator with XSLT 

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