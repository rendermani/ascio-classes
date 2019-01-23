<?php

namespace ascio\v2;

class Extension
{

    /**
     * @var string $Key
     */
    protected $Key = null;

    /**
     * @var string $Value
     */
    protected $Value = null;

    /**
     * @param string $Key
     * @param string $Value
     */
    public function __construct($Key, $Value)
    {
      $this->Key = $Key;
      $this->Value = $Value;
    }

    /**
     * @return string
     */
    public function getKey()
    {
      return $this->Key;
    }

    /**
     * @param string $Key
     * @return \ascio\v2\Extension
     */
    public function setKey($Key)
    {
      $this->Key = $Key;
      return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param string $Value
     * @return \ascio\v2\Extension
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
