<?php

namespace ascio\v2;

class GetOrder
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $orderId
     */
    protected $orderId = null;

    /**
     * @param string $sessionId
     * @param string $orderId
     */
    public function __construct($sessionId, $orderId)
    {
      $this->sessionId = $sessionId;
      $this->orderId = $orderId;
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
     * @return \ascio\v2\GetOrder
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
      return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return \ascio\v2\GetOrder
     */
    public function setOrderId($orderId)
    {
      $this->orderId = $orderId;
      return $this;
    }

}
