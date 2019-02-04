<?php

namespace ascio\v3;

class GetQueueMessageResponse extends AbstractResponse
{

    /**
     * @var QueueMessage $Message
     */
    protected $Message = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return QueueMessage
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param QueueMessage $Message
     * @return \ascio\v3\GetQueueMessageResponse
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
