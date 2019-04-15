<?php
namespace ascio\model\common;
use ascio\workflows\Workflow;
use ascio\workflows\WorkflowStep;
use Illuminate\Database\Eloquent\Model;

class WorkflowModel extends Model {
    /**
     * @var WorkflowStep $object 
     */
    protected $object; 

    protected $primaryKey = "Id";
    protected $table = "Workflow";
    protected $guarded  = [];
    public function saveOrFail(array $options = []) {
        $this->attributes["Properties"] = json_encode($this->object->getProperties());
        parent::saveOrFail();
    }
    /**
     * Get the object
     */ 
    public function getObject() : WorkflowStep
    {
        return $this->object;
    }

    /**
     * Set the object
     * @param Workflow $object 
     * @return  self
     */ 
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }
    public function scopeId($query,$id) {                
        return $query->where("Id",$id)->firstOrFail()->getAttributes(); 
    }
    public function scopeSync($query) {                
        $query->first();        
        if($this->attributes["Properties"]) {
            $this->object->setProperties(json_decode($this->attributes["Properties"]));
        }
    }
    public function scopeNext($query) {                
        return $query
        ->id($this->getAttribute("Id"))
        ->where("Status","NotSet")
        ->orderBy("Id","asc")
        ->firstOrFail();        
    }
    public function scopeNextWorkflow($query) {                
        return $query
        ->id($this->getAttribute("Id"))
        ->where("Status","NotSet")
        ->orderBy("Id","asc")
        ->firstOrFail();        
    }
    public function scopeWorkflow($query) {
        return $query
        ->where("Domain",$this->attributes["Domain"])
        ->where("Name",$this->attributes["Name"])
        ->firstOrFail();        
        //REVIEW: could make problems when switching partners. 
    }
    public function scopeOrderId($query,$orderId) {
        return $query
        ->join("WorkflowStep","WorkflowStep.Workflow","=","Workflow.Id")
        ->where("WorkflowStep.OrderId",$orderId)
        ->firstOrFail();

    }
    public function active() {
        
    }
}
