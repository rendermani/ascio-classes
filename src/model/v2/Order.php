<?php
namespace ascio\model\v2;

use ascio\lib\Db;
use ascio\v2\OrderStatusType;

class Order extends Db {
    protected $table = 'v2_Order';
    protected $primaryKey = "OrderId";
    protected $guarded  = [];
    
    protected $linkedHandles =  ["Domain" => "ascio\\lib\\v2\\Domain"]; 
    
    public function scopeActive($query,$domainName) {    
        return $query
            ->join('v2_Domain', 'v2_Order.Domain', '=', 'v2_Domain.DomainHandle')
            ->where("DomainName",$domainName)
            ->where("Code",">",100)
            ->where("v2_Order.Status","LIKE",["Completed","Failed","Invalid"])
            ->exists();                       
    }
    public function scopeNext($query,$domainName=null) {        
        if($domainName) {
            return $query
            ->join('v2_Domain', 'v2_Order.Domain', '=', 'v2_Domain.DomainHandle')
            ->where("v2_Order.Code",100)
            ->where("DomainName",$domainName)
            ->orderBy("v2_Order.CreDate","asc")
            ->firstOrFail();
        } else {
            return $query
                ->where("v2_Order.Code",100)
                ->orderBy("CreDate","asc")
                ->firstOrFail();
        }

    }
    public function scopeUpdateStatus($query) {        
        return  $query        
        ->where("OrderId",$this->OrderId)
        ->update(
            [
                "Status" => $this->Status,
                "Code" => $this->Code,
                "Message" => $this->Message,
            ]
        );                      
    }
}