<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class Registrant extends Db {
    protected $table = 'v2_Registrant';
    protected $primaryKey = "Handle";
    protected $guarded  = [];
    
}