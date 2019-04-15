<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class DnsSecKeys extends Db {
    protected $table = 'v2_DnsSecKeys';
    protected $primaryKey = "Handle"; 
    protected $guarded  = [];   
    protected $linkedHandles = [
        "DnsSecKey1" => "ascio\\lib\\v2\\DnsSecKey",
        "DnsSecKey2" => "ascio\\lib\\v2\\DnsSecKey",
        "DnsSecKey3" => "ascio\\lib\\v2\\DnsSecKey",
        "DnsSecKey4" => "ascio\\lib\\v2\\DnsSecKey",
        "DnsSecKey5" => "ascio\\lib\\v2\\DnsSecKey"            
    ];
}