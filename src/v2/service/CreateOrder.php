<?php

namespace ascio\v2;

class CreateOrder
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var Order $order
     */
    protected $order = null;

    /**
     * @param string $sessionId
     * @param Order $order
     */
    public function __construct($sessionId, $order)
    {
      $this->sessionId = $sessionId;
      $this->order = $order;
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
     * @return \ascio\v2\CreateOrder
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
      return $this->order;
    }

    /**
     * @param Order $order
     * @return \ascio\v2\CreateOrder
     */
    public function setOrder($order)
    {
      $this->order = $order;
      return $this;
    }

}
