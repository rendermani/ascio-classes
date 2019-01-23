<?php

namespace ascio\v2;

class CallbackStatus
{

    /**
     * @var string $Message
     */
    protected $Message = null;

    /**
     * @var string $Status
     */
    protected $Status = null;

    
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
     * @return \ascio\v2\CallbackStatus
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param string $Status
     * @return \ascio\v2\CallbackStatus
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

}
