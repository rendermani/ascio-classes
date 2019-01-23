<?php

namespace ascio\v2;

class AckMessage
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var int $msgId
     */
    protected $msgId = null;

    /**
     * @param string $sessionId
     * @param int $msgId
     */
    public function __construct($sessionId, $msgId)
    {
      $this->sessionId = $sessionId;
      $this->msgId = $msgId;
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
     * @return \ascio\v2\AckMessage
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return int
     */
    public function getMsgId()
    {
      return $this->msgId;
    }

    /**
     * @param int $msgId
     * @return \ascio\v2\AckMessage
     */
    public function setMsgId($msgId)
    {
      $this->msgId = $msgId;
      return $this;
    }

}
