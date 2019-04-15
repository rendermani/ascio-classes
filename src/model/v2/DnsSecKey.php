<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class DnsSecKey extends Db {
    protected $table = 'v2_DnsSecKey';
    protected $primaryKey = "Handle"; 
    protected $guarded  = [];   
}