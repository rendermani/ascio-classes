<?php

namespace ascio\v2;

class SearchOrder
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var SearchOrderRequest $orderRequest
     */
    protected $orderRequest = null;

    /**
     * @param string $sessionId
     * @param SearchOrderRequest $orderRequest
     */
    public function __construct($sessionId, $orderRequest)
    {
      $this->sessionId = $sessionId;
      $this->orderRequest = $orderRequest;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
      return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return \ascio\v2\SearchOrder
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return SearchOrderRequest
     */
    public function getOrderRequest()
    {
      return $this->orderRequest;
    }

    /**
     * @param SearchOrderRequest $orderRequest
     * @return \ascio\v2\SearchOrder
     */
    public function setOrderRequest($orderRequest)
    {
      $this->orderRequest = $orderRequest;
      return $this;
    }

}
