<?php
namespace ascio\model\v2;

use ascio\lib\Db;

class PrivacyProxy extends Db {
    protected $table = 'v2_PrivacyProxy';
    protected $primaryKey = "Handle"; 
    protected $guarded  = [];   
    protected $linkedHandles = [
        "Extensions" => "ascio\\lib\\v2\\Extensions"
        
        ];
    public function saveObject(array $data = [])
    {
        $this->getObject()->updateExtensionParent();
        parent::saveObject($data);
    }
}