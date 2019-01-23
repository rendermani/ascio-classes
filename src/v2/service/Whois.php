<?php

namespace ascio\v2;

class Whois
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $domainName
     */
    protected $domainName = null;

    /**
     * @param string $sessionId
     * @param string $domainName
     */
    public function __construct($sessionId, $domainName)
    {
      $this->sessionId = $sessionId;
      $this->domainName = $domainName;
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
     * @return \ascio\v2\Whois
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomainName()
    {
      return $this->domainName;
    }

    /**
     * @param string $domainName
     * @return \ascio\v2\Whois
     */
    public function setDomainName($domainName)
    {
      $this->domainName = $domainName;
      return $this;
    }

}
