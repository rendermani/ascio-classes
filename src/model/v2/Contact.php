<?php
namespace ascio\model\v2;
use ascio\lib\Db;
use ascio\lib\Tools;

class Contact extends Db {
    protected $table = 'v2_Contact';
    protected $primaryKey = "Handle";
    protected $guarded  = [];

}