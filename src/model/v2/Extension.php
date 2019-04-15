<?php
namespace ascio\model\v2;
use ascio\lib\Db;
use ascio\lib\Tools;

class Extension extends Db {
    protected $table = 'v2_Extension';
    protected $primaryKey = "Id";
    protected $guarded  = [];
    
}