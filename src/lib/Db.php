<?php 
namespace ascio\lib;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\DbProperties;

class Db extends Model {
    /**
     * Need this to create the table; 
     * Object $object Ascio Object
     */
    private $object;
    /**
     * @var boolean $fullData is false when only a handle exists
     */
    public $fullData = true; 
    private $oldHandle;
    protected $linkedHandles = []; 
    /**
     * @var DbProperties $properties
     */
    protected $properties;
    protected $dates = [
        'CreDate',
        'ExpDate'
    ];
    public function setObject($object) {
        $this->object = $object;
        $this->properties = $object->properties;
    }
    public function getObject() {
        return $this->object;
    }
    public function saveObject(array $data = []) {
        /**
         * @var DbProperties $properties
         */               
        //if the structure starts with a handle throw an AscioException
         if($this->fullData == false) {
            throw new AscioException("Please provide a ".get_class($this->object)." with full data");
        }
        $properties = $this->object->properties;              
        foreach($properties->getObjects() as $key => $object) {
            //if a property is a handle, don't save
            if($object->db->fullData==true) {
                $object->db->saveObject();
            }            
        } 
        // replace the temporary handles in the database, if real handles exist           
        $this->updateHandle();
        $filter = [$this->primaryKey =>   $this->setHandle()];         
        // get objects with links to handles
        $object = $properties->getWithHandles();        
        try {
            parent::updateOrCreate($filter,$object);            
        }  catch (\PDOException $e) {             
            // create the table and try again
            if($e->getCode()=="42S02") {
                $this->createTable();
                parent::updateOrCreate($filter,$object);
                
            } else {
                throw($e);
            }
        }        
    }
    /**
     * After an order is created temporary handles need to be updated-
     * Replace the temporary handles in the database, if real handles exists
     */
    private function updateHandle() {        
        if(
            $this->getHandle() &&
            $this->getOldHandle() &&
            $this->getOldHandle() != $this->getHandle()) {
           
            $newExists = $this->where($this->getPrimaryKey(),$this->getHandle())->exists();
            if($newExists) {
                return $this->destroy($this->getOldHandle());
            }            
            $this->where($this->getPrimaryKey(),$this->getOldHandle())
            ->update([$this->getPrimaryKey() => $this->getHandle()]);
            foreach($this->properties->getObjects() as $key => $object) {
                $object->db->updateHandle();
            }
        }
    }
    /**
     * if object is in an order and no Handles exist. If no handle is provided an ID is generated.
     * @return string the handle that was created 
     */
    private function setHandle ($id = null) : string {        
        $id = $id ? $id : $this->getHandle();
        $setter = "set".$this->object->db->primaryKey; 
        if(!$id) {
            $id = $this->getOldHandle() ? $this->getOldHandle() :  "_".uniqid() ;
        }
        $this->object->$setter($id);
        if(strpos($id,"_")===0) {
            $this->oldHandle = $id;
        }        
        return $id;
    }
     /**
     * Gets the right handle, DomainHandle or Handle.
     * @return string the handle 
     */
    public function getHandle () {
        $getter = "get".$this->object->db->primaryKey; 
        $id = $this->object->$getter();
        return $id;
    }
     /**
     * Set Old Handle. If the data comes from the database, and there is a temperarory key, this is important.
     * The filter must search for the old key, and replace it with the new one.      
     * @return string the handle 
     */
    public function setOldHandle (string $oldHandle) {
        $this->oldHandle = $oldHandle;
    }
    public function getOldHandle () {
        return $this->oldHandle;
    }
    public function createTable() {
        /**
         * @var DbProperties $properties
         */
        $properties = $this->object->properties;    
        $query = "CREATE TABLE ". $this->table ."("; 
        foreach($properties->all() as $key => $value) {             
            $property = $properties->get($key);
            $length = $property->length ? " (".$property->length.")" : "";
            $type =  " ".$property->type . $length;
            $query .= $key . $type. ",\n";
        }
        $query .= "updated_at DATE,\n";
        $query .= "created_at DATE,\n";
        $query .= "PRIMARY KEY (`".$this->primaryKey."`)\n)";
        Capsule::statement($query);
    }
    public function getDb($handle=null) {
        $handle = $handle ?  $handle : $this->getHandle();
        $result = $this->where($this->getPrimaryKey(),$handle)->firstOrFail();
        Tools::merge($result->getAttributes(),$this->object);                       
        $this->setOldHandle($this->getHandle()); 
        // get all linked handles
        foreach ($this->linkedHandles as $var  => $class) {
            $handle = $result->getAttributes()[$var];
            if(!$handle) continue;
            $object = new $class();
            $object->db->setHandle($handle);
            $object->db->getDb();
            $this->object->{"set".$var}($object);
        }
        return $this->object;
        
    }
    public function sync() : void {
        $result = $this->where($this->getPrimaryKey(),$this->getHandle())->first();
        if(isset($result)) {
           Tools::mergeProperties($result->getAttributes(),$this->object);                       
           $this->setOldHandle($this->getHandle()); 
        } else {
            throw new \Exception("Handle ".$this->getHandle()." not found");
        }
        foreach ($this->linkedHandles as $var  => $class) {
            $handle = $this->object->{"get".$var}();
            if(!$handle) continue;
            $object = new $class();
            $object->db->setHandle($handle);
            $object->db->sync();
            $this->object->{"set".$var}($object);
        }
        
    }
    public function getPrimaryKey() {
        return $this->primaryKey;
    } 
    public function getLinkedHandles() {
        return $this->linkedHandles;
    }   
    public function scopeSame($query) {                
        $object =  Tools::merge($this->getObject(),[]);
        unset($object["Handle"]);
        unset($object["CreDate"]);
        return $query->where($object); 
    }
}
