<?php

namespace ascio\v2;

class ArrayOfCallbackStatus
{

    /**
     * @var CallbackStatus[] $CallbackStatus
     */
    protected $CallbackStatus = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return CallbackStatus[]
     */
    public function getCallbackStatus()
    {
      return $this->CallbackStatus;
    }

    /**
     * @param CallbackStatus[] $CallbackStatus
     * @return \ascio\v2\ArrayOfCallbackStatus
     */
    public function setCallbackStatus(array $CallbackStatus)
    {
      $this->CallbackStatus = $CallbackStatus;
      return $this;
    }

}
