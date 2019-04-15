<?php
namespace ascio\model\v2;
use ascio\lib\Db;
use ascio\lib\Tools;

class Extensions extends Db {
    protected $table = 'v2_Extension';
    protected $primaryKey = "Id";
    protected $guarded  = [];
    protected $linkedHandles = [
        "Extension" => "ascio\\lib\\v2\\Extension"
        
        ];

    public function saveObject() {
        foreach($this->getExtension() as $key => $extension) {
            /**
             * @var Extension $extension;
             */
            $extension->db->saveObject();
        }
    }
}