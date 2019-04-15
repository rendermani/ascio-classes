<?php
namespace ascio\model\common;
use ascio\workflows\Workflow;
use ascio\workflows\WorkflowStep;
use Illuminate\Database\Eloquent\Model;

class WorkflowStepModel extends Model {
    /**
     * @var WorkflowStep $object 
     */
    private $object;         
    /**
    * @var Workflow $workflow 
    */
   private $workflow; 
    protected $primaryKey = "Id";
    protected $table = "WorkflowStep";
    protected $guarded  = [];
    public function saveOrFail(array $options = []) {
        parent::saveOrFail();
    }
    public function scopeId($query,$id) {                
        $result = $query->where("Id",$id)->first();    
        $this->setRawAttributes($result->getAttributes());
        return $result->getAttributes();     
    }
    public function scopeNext($query) {                
        return $query
        ->where("Workflow",$this->getAttribute("Workflow"))
        ->where("Status","NotSet")
        ->orderBy("Id","asc")
        ->first();        
    }
    public function scopeCurrent($query) {                
        return $query
        ->where("Workflow",$this->getAttribute("Workflow"))
        ->where("Status","NOT LIKE","NotSet")
        ->orderBy("Id","asc")
        ->first();        
    }
    public function scopeOrderId($query,$orderId) {                
        $result =  $query
        ->where("OrderId",$orderId)
        ->firstOrFail();    
        $this->setRawAttributes($result->getAttributes());
        return $result->getAttributes();    
    }
}