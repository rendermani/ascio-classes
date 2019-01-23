<?php

namespace ascio\v2;

class CreateRegistrant
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var Registrant $registrant
     */
    protected $registrant = null;

    /**
     * @param string $sessionId
     * @param Registrant $registrant
     */
    public function __construct($sessionId, $registrant)
    {
      $this->sessionId = $sessionId;
      $this->registrant = $registrant;
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
     * @return \ascio\v2\CreateRegistrant
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return Registrant
     */
    public function getRegistrant()
    {
      return $this->registrant;
    }

    /**
     * @param Registrant $registrant
     * @return \ascio\v2\CreateRegistrant
     */
    public function setRegistrant($registrant)
    {
      $this->registrant = $registrant;
      return $this;
    }

}
