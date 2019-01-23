<?php

namespace ascio\v2;

class LogOut
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @param string $sessionId
     */
    public function __construct($sessionId)
    {
      $this->sessionId = $sessionId;
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
     * @return \ascio\v2\LogOut
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

}
