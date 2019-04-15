<?php
namespace ascio\base\v2;
use ascio\lib\Ascio;
use ascio\lib\AscioException;
use ascio\base\BaseConnectorInterface;


class ApiV2 extends ApiBase implements BaseConnectorInterface{
    protected $attributes  = [];
    protected $handle;
    protected $parent;
    private $apiObj;
    
    public function client() {

    }
}   