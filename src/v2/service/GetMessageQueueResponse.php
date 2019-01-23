<?php

namespace ascio\v2;

class GetMessageQueueResponse
{

    /**
     * @var Response $GetMessageQueueResult
     */
    protected $GetMessageQueueResult = null;

    /**
     * @var QueueItem $item
     */
    protected $item = null;

    /**
     * @param Response $GetMessageQueueResult
     * @param QueueItem $item
     */
    public function __construct($GetMessageQueueResult, $item)
    {
      $this->GetMessageQueueResult = $GetMessageQueueResult;
      $this->item = $item;
    }

    /**
     * @return Response
     */
    public function getGetMessageQueueResult()
    {
      return $this->GetMessageQueueResult;
    }

    /**
     * @param Response $GetMessageQueueResult
     * @return \ascio\v2\GetMessageQueueResponse
     */
    public function setGetMessageQueueResult($GetMessageQueueResult)
    {
      $this->GetMessageQueueResult = $GetMessageQueueResult;
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
     * @return \ascio\v2\GetMessageQueueResponse
     */
    public function setItem($item)
    {
      $this->item = $item;
      return $this;
    }

}
