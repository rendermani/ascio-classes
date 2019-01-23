<?php

namespace ascio\v2;

class DoRegistrantVerification
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $value
     */
    protected $value = null;

    /**
     * @param string $sessionId
     * @param string $value
     */
    public function __construct($sessionId, $value)
    {
      $this->sessionId = $sessionId;
      $this->value = $value;
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
     * @return \ascio\v2\DoRegistrantVerification
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param string $value
     * @return \ascio\v2\DoRegistrantVerification
     */
    public function setValue($value)
    {
      $this->value = $value;
      return $this;
    }

}
