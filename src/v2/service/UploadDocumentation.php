<?php

namespace ascio\v2;

class UploadDocumentation
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
     * @var string $fileName
     */
    protected $fileName = null;

    /**
     * @var base64Binary $content
     */
    protected $content = null;

    /**
     * @param string $sessionId
     * @param string $orderId
     * @param string $fileName
     * @param base64Binary $content
     */
    public function __construct($sessionId, $orderId, $fileName, $content)
    {
      $this->sessionId = $sessionId;
      $this->orderId = $orderId;
      $this->fileName = $fileName;
      $this->content = $content;
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
     * @return \ascio\v2\UploadDocumentation
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
     * @return \ascio\v2\UploadDocumentation
     */
    public function setOrderId($orderId)
    {
      $this->orderId = $orderId;
      return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
      return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return \ascio\v2\UploadDocumentation
     */
    public function setFileName($fileName)
    {
      $this->fileName = $fileName;
      return $this;
    }

    /**
     * @return base64Binary
     */
    public function getContent()
    {
      return $this->content;
    }

    /**
     * @param base64Binary $content
     * @return \ascio\v2\UploadDocumentation
     */
    public function setContent($content)
    {
      $this->content = $content;
      return $this;
    }

}
