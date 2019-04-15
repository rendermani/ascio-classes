<?php
namespace ascio\model\v2;
use ascio\lib\Db;
use ascio\lib\Tools;

class QueueItem extends Db {
    protected $table = 'v2_QueueItem';
    protected $primaryKey = "Id";
    protected $guarded  = [];
}