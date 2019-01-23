<?php

namespace ascio\v2;

class PollMessage
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var MessageType $msgType
     */
    protected $msgType = null;

    /**
     * @param string $sessionId
     * @param MessageType $msgType
     */
    public function __construct($sessionId, $msgType)
    {
      $this->sessionId = $sessionId;
      $this->msgType = $msgType;
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
     * @return \ascio\v2\PollMessage
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return MessageType
     */
    public function getMsgType()
    {
      return $this->msgType;
    }

    /**
     * @param MessageType $msgType
     * @return \ascio\v2\PollMessage
     */
    public function setMsgType($msgType)
    {
      $this->msgType = $msgType;
      return $this;
    }

}
