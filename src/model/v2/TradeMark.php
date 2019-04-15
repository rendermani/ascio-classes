<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class TradeMark extends Db {
    protected $table = 'v2_TradeMark';
    protected $primaryKey = "Handle"; 
    protected $guarded  = [];   
}