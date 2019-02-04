<?php

namespace ascio\v3;

class GetQueueMessageRequest
{

    /**
     * @var int $MessageId
     */
    protected $MessageId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getMessageId()
    {
      return $this->MessageId;
    }

    /**
     * @param int $MessageId
     * @return \ascio\v3\GetQueueMessageRequest
     */
    public function setMessageId($MessageId)
    {
      $this->MessageId = $MessageId;
      return $this;
    }

}
