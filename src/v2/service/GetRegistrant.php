<?php

namespace ascio\v2;

class GetRegistrant
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $registrantHandle
     */
    protected $registrantHandle = null;

    /**
     * @param string $sessionId
     * @param string $registrantHandle
     */
    public function __construct($sessionId, $registrantHandle)
    {
      $this->sessionId = $sessionId;
      $this->registrantHandle = $registrantHandle;
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
     * @return \ascio\v2\GetRegistrant
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getRegistrantHandle()
    {
      return $this->registrantHandle;
    }

    /**
     * @param string $registrantHandle
     * @return \ascio\v2\GetRegistrant
     */
    public function setRegistrantHandle($registrantHandle)
    {
      $this->registrantHandle = $registrantHandle;
      return $this;
    }

}
