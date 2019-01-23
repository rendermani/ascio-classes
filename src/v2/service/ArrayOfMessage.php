<?php

namespace ascio\v2;

class ArrayOfMessage
{

    /**
     * @var Message[] $Message
     */
    protected $Message = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Message[]
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param Message[] $Message
     * @return \ascio\v2\ArrayOfMessage
     */
    public function setMessage(array $Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
