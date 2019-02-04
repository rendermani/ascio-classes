<?php

namespace ascio\v3;

class Extensions
{

    /**
     * @var KeyValue[] $KeyValue
     */
    protected $KeyValue = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return KeyValue[]
     */
    public function getKeyValue()
    {
      return $this->KeyValue;
    }

    /**
     * @param KeyValue[] $KeyValue
     * @return \ascio\v3\Extensions
     */
    public function setKeyValue(array $KeyValue = null)
    {
      $this->KeyValue = $KeyValue;
      return $this;
    }

}
