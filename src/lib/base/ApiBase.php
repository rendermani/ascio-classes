<?
namespace ascio\base;


Class ApiBase {
    private $parent;
    public function __construct($parent)
    {   
        $this->setParent($parent);
    }
    public function update() {        
        throw new AscioException("Function not implemented. Please update the parent Object");
    }
    public function create() {        
        throw new AscioException("Function not implemented. Please creaate the parent Object");
    }
    public function delete() {        
        throw new AscioException("Function not implemented. Please delete the parent Object");
    }
    public function get() {        
        throw new AscioException("Function not implemented. Please get the parent Object");
    }
    public function getParent()
    {
        return $this->parent;
    }
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }
    public function getAttributes() : iterable {
        $out = [];
        foreach($this->attributes as $key => $name) {
            $out[$name] = $this->$name;
        }
        return $out;
    }
    public function getObjects() : iterable {
        $out = [];
        foreach($this->getAttributes() as $key => $name) {
            if(is_object($this->$name)) {
                $out[$name] = $this->$name;
            }            
        }
        return $out;
    }
    public function setAttributes(iterable $array) : ApiBase{
        foreach($array as $key => $value) {
            $this->$key = $value;             
        }
        return $this;
    }
    public function getHandle() {
        return $this->handle;
    }
    public function setHandle($handle) {
        $this->handle = $handle;
        return $this;
    }
    public function init () {
        foreach($this->getObjects() as $key => $value) {
            $value->__construct();
            $value->init();
        }
        return $this;
    }
}