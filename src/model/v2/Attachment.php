<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class Attachment extends Db {
    protected $table = 'v2_Attachment';
    protected $primaryKey = "MsgId"; 
    protected $guarded  = [];   
}