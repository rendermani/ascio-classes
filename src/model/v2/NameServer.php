<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class NameServer extends Db {
    protected $table = 'v2_NameServer';
    protected $primaryKey = "Handle"; 
    protected $guarded  = [];   
}