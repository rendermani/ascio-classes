<?php

namespace ascio\v2;

class GetDnsSecKey
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $dnsSecKeyHandle
     */
    protected $dnsSecKeyHandle = null;

    /**
     * @param string $sessionId
     * @param string $dnsSecKeyHandle
     */
    public function __construct($sessionId, $dnsSecKeyHandle)
    {
      $this->sessionId = $sessionId;
      $this->dnsSecKeyHandle = $dnsSecKeyHandle;
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
     * @return \ascio\v2\GetDnsSecKey
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getDnsSecKeyHandle()
    {
      return $this->dnsSecKeyHandle;
    }

    /**
     * @param string $dnsSecKeyHandle
     * @return \ascio\v2\GetDnsSecKey
     */
    public function setDnsSecKeyHandle($dnsSecKeyHandle)
    {
      $this->dnsSecKeyHandle = $dnsSecKeyHandle;
      return $this;
    }

}
