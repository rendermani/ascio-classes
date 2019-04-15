<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class NameServers extends Db {
    protected $table = 'v2_NameServers';
    protected $primaryKey = "Handle"; 
    protected $guarded  = [];   
    protected $linkedHandles = [
        "NameServer1" => "ascio\\lib\\v2\\NameServer",
        "NameServer2" => "ascio\\lib\\v2\\NameServer",
        "NameServer3" => "ascio\\lib\\v2\\NameServer",
        "NameServer4" => "ascio\\lib\\v2\\NameServer",
        "NameServer5" => "ascio\\lib\\v2\\NameServer",
        "NameServer6" => "ascio\\lib\\v2\\NameServer",
        "NameServer7" => "ascio\\lib\\v2\\NameServer",
        "NameServer8" => "ascio\\lib\\v2\\NameServer",
        "NameServer9" => "ascio\\lib\\v2\\NameServer",
        "NameServer10" => "ascio\\lib\\v2\\NameServer",
        "NameServer11" => "ascio\\lib\\v2\\NameServer",
        "NameServer12" => "ascio\\lib\\v2\\NameServer",
        "NameServer13" => "ascio\\lib\\v2\\NameServer"

        
    ];
}