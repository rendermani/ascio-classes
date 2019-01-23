<?php

namespace ascio\v2;

class AckMessageResponse
{

    /**
     * @var Response $AckMessageResult
     */
    protected $AckMessageResult = null;

    /**
     * @param Response $AckMessageResult
     */
    public function __construct($AckMessageResult)
    {
      $this->AckMessageResult = $AckMessageResult;
    }

    /**
     * @return Response
     */
    public function getAckMessageResult()
    {
      return $this->AckMessageResult;
    }

    /**
     * @param Response $AckMessageResult
     * @return \ascio\v2\AckMessageResponse
     */
    public function setAckMessageResult($AckMessageResult)
    {
      $this->AckMessageResult = $AckMessageResult;
      return $this;
    }

}
