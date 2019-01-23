<?php

namespace ascio\v2;

class CreateDnsSecKeyResponse
{

    /**
     * @var Response $CreateDnsSecKeyResult
     */
    protected $CreateDnsSecKeyResult = null;

    /**
     * @var DnsSecKey $dnsSecKey
     */
    protected $dnsSecKey = null;

    /**
     * @param Response $CreateDnsSecKeyResult
     * @param DnsSecKey $dnsSecKey
     */
    public function __construct($CreateDnsSecKeyResult, $dnsSecKey)
    {
      $this->CreateDnsSecKeyResult = $CreateDnsSecKeyResult;
      $this->dnsSecKey = $dnsSecKey;
    }

    /**
     * @return Response
     */
    public function getCreateDnsSecKeyResult()
    {
      return $this->CreateDnsSecKeyResult;
    }

    /**
     * @param Response $CreateDnsSecKeyResult
     * @return \ascio\v2\CreateDnsSecKeyResponse
     */
    public function setCreateDnsSecKeyResult($CreateDnsSecKeyResult)
    {
      $this->CreateDnsSecKeyResult = $CreateDnsSecKeyResult;
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
     * @return \ascio\v2\CreateDnsSecKeyResponse
     */
    public function setDnsSecKey($dnsSecKey)
    {
      $this->dnsSecKey = $dnsSecKey;
      return $this;
    }

}
