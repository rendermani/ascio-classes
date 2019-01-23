<?php

namespace ascio\v2;

class UploadMessage
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
     * @var Message $message
     */
    protected $message = null;

    /**
     * @param string $sessionId
     * @param string $orderId
     * @param Message $message
     */
    public function __construct($sessionId, $orderId, $message)
    {
      $this->sessionId = $sessionId;
      $this->orderId = $orderId;
      $this->message = $message;
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
     * @return \ascio\v2\UploadMessage
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
     * @return \ascio\v2\UploadMessage
     */
    public function setOrderId($orderId)
    {
      $this->orderId = $orderId;
      return $this;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
      return $this->message;
    }

    /**
     * @param Message $message
     * @return \ascio\v2\UploadMessage
     */
    public function setMessage($message)
    {
      $this->message = $message;
      return $this;
    }

}
