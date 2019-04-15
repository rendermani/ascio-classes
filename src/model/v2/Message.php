<?php
namespace ascio\model\v2;
use ascio\lib\Db;
use ascio\lib\Tools;

class Message extends Db {
    protected $table = 'v2_Message';
    protected $primaryKey = "Id";
    protected $guarded  = [];
}