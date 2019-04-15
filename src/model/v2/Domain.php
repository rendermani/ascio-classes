<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class Domain extends Db {
    protected $table = 'v2_Domain';
    protected $primaryKey = "DomainHandle"; 
    protected $guarded  = [];   
    protected $dates = [
        'CreDate',
        'ExpDate'
    ];
    protected $linkedHandles = [
        "Registrant" => "ascio\\lib\\v2\\Registrant",
        "AdminContact" => "ascio\\lib\\v2\\Contact",
        "TechContact" => "ascio\\lib\\v2\\Contact",
        "BillingContact" => "ascio\\lib\\v2\\Contact",
        "ResellerContact" => "ascio\\lib\\v2\\Contact",
        "TradeMark" => "ascio\\lib\\v2\\TradeMark",
        "NameServers" => "ascio\\lib\\v2\\NameServers",
        "NameServers" => "ascio\\lib\\v2\\NameServers",
        "PrivacyProxy" => "ascio\\lib\\v2\\PrivacyProxy"
        
        ];
    public function scopeDomain($query,$handle) {
        $field = strpos($handle,".") === false ? "DomainHandle" : "DomainName";
        return $query->where($field,$handle);
        
    }
    
    
}