<?php 
namespace ascio\lib;
class DbProperties {
    private $properties = [];
    private $object;
    public function __construct($object) 
    {
        $this->object = $object;
        $this->merge();
        $api = strpos(get_class($object),"\\v2") === false ? "v3" : "v2";
        $this->add("CreDate","DateTime");
        $this->add("ExpDate","DateTime");
        $this->add("Account","VARCHAR",200);
        $this->set("Account",Ascio::getPartner());
        $this->add("ExtClientId","VARCHAR",200);       
    }
    public function add($key,$type="varchar",$length=null) {
        $this->properties[$key] =  new DbProperty($key,$type,$length);
        return $this->properties[$this->properties->key];
    }   
    public function set($key,$value) {
        assert($this->properties[$key],new \Exception("Please add property definition before setting it."));
        $this->properties[$key]->value = $value;
    }   
    public function get($key) : DbProperty {
        $this->merge();
        assert($this->properties[$key],new \Exception("$key not found. Please add property definitions before getting it."));
        return $this->properties[$key];
    }
    public function all() {
        $this->merge();
        $out = [];
        foreach($this->properties as $key => $property) {
            $out[$key] = $property->value; 
        }

        return $out;
    }    
    public function getWithHandles() : Array {
        $this->merge();
        $out = [];
        foreach($this->properties as $key => $property) {
            if (is_object($property->value) && isset($property->value->db)) {
                $value = $property->value->{"get".$property->value->db->getPrimaryKey()}();
            }  else {
                $value = $property->value;
            }
            $out[$key] = $value; 
        }
        return $out;
    } 
    public function setObject($object)  {
        $this->object = $object;
        $this->merge();

    }
    public function getObjects()  {
        $out = [];
        foreach(Tools::getProperties($this->object) as $key => $value) {
            if(is_object($value) && property_exists($value,"db")) {
                $out[$key] = $value;
            }
        }
        return $out; 
    }
    protected function merge() {
        foreach(Tools::getProperties($this->object) as $key => $value) {
            if(!$this->properties[$key]) {
                $this->add($key,"VARCHAR",200);
            }
            $this->set($key,$value);
            if(is_object($value) && property_exists($value,"properties")) {
                if(!$value->properties) $value->properties = new DbProperties($value);
                $value->properties->merge();
            }          
        }
        
    }
}
class DbProperty {
    public $key;
    public $value; 
    public $type;
    public $length;
    function __construct($key,$type="varchar",$length=null)
    {
        if($type == "varchar" &&! $length) {
            $length = 200;
        }
        $this->key = $key;
        $this->type = $type;
        $this->length = $length;
    }
}
