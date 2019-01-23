<?php

namespace ascio\v2;

class CreateDnsSecKey
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var DnsSecKey $dnsSecKey
     */
    protected $dnsSecKey = null;

    /**
     * @param string $sessionId
     * @param DnsSecKey $dnsSecKey
     */
    public function __construct($sessionId, $dnsSecKey)
    {
      $this->sessionId = $sessionId;
      $this->dnsSecKey = $dnsSecKey;
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
     * @return \ascio\v2\CreateDnsSecKey
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return DnsSecKey
     */
    public function getDnsSecKey()
    {
      return $this->dnsSecKey;
    }

    /**
     * @param DnsSecKey $dnsSecKey
     * @return \ascio\v2\CreateDnsSecKey
     */
    public function setDnsSecKey($dnsSecKey)
    {
      $this->dnsSecKey = $dnsSecKey;
      return $this;
    }

}
