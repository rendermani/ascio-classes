<?php

namespace ascio\v2;

class Response
{

    /**
     * @var string $Message
     */
    protected $Message = null;

    /**
     * @var int $ResultCode
     */
    protected $ResultCode = null;

    /**
     * @var ArrayOfstring $Values
     */
    protected $Values = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param string $Message
     * @return \ascio\v2\Response
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

    /**
     * @return int
     */
    public function getResultCode()
    {
      return $this->ResultCode;
    }

    /**
     * @param int $ResultCode
     * @return \ascio\v2\Response
     */
    public function setResultCode($ResultCode)
    {
      $this->ResultCode = $ResultCode;
      return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getValues()
    {
      return $this->Values;
    }

    /**
     * @param ArrayOfstring $Values
     * @return \ascio\v2\Response
     */
    public function setValues($Values)
    {
      $this->Values = $Values;
      return $this;
    }

}
