<?php
namespace  ascio\base;
use ascio\lib\v2\base\DbBase;
use ascio\lib\v2\base\ApiBase;
use ascio\lib\AscioException;

class BaseClass  {
    protected $apiAttributes  = [];
    protected $handle;
    protected $parent;
    /**
     * @var ApiBase $apiObj
     */
    protected $apiObj;
        /**
     * @var DbBase $dbObj
     */
    protected $dbObj;
    
    public function __construct()
    {
        $this->apiObj = new ApiBase(); 
        $this->apiObj->setParent($this);
        $this->dbObj = new DbBase(); 
        $this->dbObj->setParent($this);
    }
    public function toArray() {
        return (array) $this;
    }
    public function fromArray($array) {
        foreach($array as $key => $value) {
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
    public function update() {
        //TODO: Reverse search of parent/parents and call update. eg. contacts
        throw new AscioException("Function not implemented. Please update the parent Object");
    }
    public function init () {
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
        return $this->apiObj;
    }
    public function db() {
        return $this->dbObj;
    }
}