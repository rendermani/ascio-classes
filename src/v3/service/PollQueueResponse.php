<?php

namespace ascio\v3;

class PollQueueResponse extends AbstractResponse
{

    /**
     * @var int $TotalCount
     */
    protected $TotalCount = null;

    /**
     * @var QueueMessage $Message
     */
    protected $Message = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
      return $this->TotalCount;
    }

    /**
     * @param int $TotalCount
     * @return \ascio\v3\PollQueueResponse
     */
    public function setTotalCount($TotalCount)
    {
      $this->TotalCount = $TotalCount;
      return $this;
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
     * @return \ascio\v3\PollQueueResponse
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
