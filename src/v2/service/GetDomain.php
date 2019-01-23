<?php

namespace ascio\v2;

class GetDomain
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $domainHandle
     */
    protected $domainHandle = null;

    /**
     * @param string $sessionId
     * @param string $domainHandle
     */
    public function __construct($sessionId, $domainHandle)
    {
      $this->sessionId = $sessionId;
      $this->domainHandle = $domainHandle;
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
     * @return \ascio\v2\GetDomain
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomainHandle()
    {
      return $this->domainHandle;
    }

    /**
     * @param string $domainHandle
     * @return \ascio\v2\GetDomain
     */
    public function setDomainHandle($domainHandle)
    {
      $this->domainHandle = $domainHandle;
      return $this;
    }

}
