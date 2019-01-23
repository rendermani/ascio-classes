<?php

namespace ascio\v2;

class PollMessageResponse
{

    /**
     * @var Response $PollMessageResult
     */
    protected $PollMessageResult = null;

    /**
     * @var int $msgCount
     */
    protected $msgCount = null;

    /**
     * @var QueueItem $item
     */
    protected $item = null;

    /**
     * @param Response $PollMessageResult
     * @param int $msgCount
     * @param QueueItem $item
     */
    public function __construct($PollMessageResult, $msgCount, $item)
    {
      $this->PollMessageResult = $PollMessageResult;
      $this->msgCount = $msgCount;
      $this->item = $item;
    }

    /**
     * @return Response
     */
    public function getPollMessageResult()
    {
      return $this->PollMessageResult;
    }

    /**
     * @param Response $PollMessageResult
     * @return \ascio\v2\PollMessageResponse
     */
    public function setPollMessageResult($PollMessageResult)
    {
      $this->PollMessageResult = $PollMessageResult;
      return $this;
    }

    /**
     * @return int
     */
    public function getMsgCount()
    {
      return $this->msgCount;
    }

    /**
     * @param int $msgCount
     * @return \ascio\v2\PollMessageResponse
     */
    public function setMsgCount($msgCount)
    {
      $this->msgCount = $msgCount;
      return $this;
    }

    /**
     * @return QueueItem
     */
    public function getItem()
    {
      return $this->item;
    }

    /**
     * @param QueueItem $item
     * @return \ascio\v2\PollMessageResponse
     */
    public function setItem($item)
    {
      $this->item = $item;
      return $this;
    }

}
