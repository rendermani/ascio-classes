<?php

namespace ascio\v2;

class GetDnsSecKeyResponse
{

    /**
     * @var Response $GetDnsSecKeyResult
     */
    protected $GetDnsSecKeyResult = null;

    /**
     * @var DnsSecKey $dnsSecKey
     */
    protected $dnsSecKey = null;

    /**
     * @param Response $GetDnsSecKeyResult
     * @param DnsSecKey $dnsSecKey
     */
    public function __construct($GetDnsSecKeyResult, $dnsSecKey)
    {
      $this->GetDnsSecKeyResult = $GetDnsSecKeyResult;
      $this->dnsSecKey = $dnsSecKey;
    }

    /**
     * @return Response
     */
    public function getGetDnsSecKeyResult()
    {
      return $this->GetDnsSecKeyResult;
    }

    /**
     * @param Response $GetDnsSecKeyResult
     * @return \ascio\v2\GetDnsSecKeyResponse
     */
    public function setGetDnsSecKeyResult($GetDnsSecKeyResult)
    {
      $this->GetDnsSecKeyResult = $GetDnsSecKeyResult;
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
     * @return \ascio\v2\GetDnsSecKeyResponse
     */
    public function setDnsSecKey($dnsSecKey)
    {
      $this->dnsSecKey = $dnsSecKey;
      return $this;
    }

}
