<?php

namespace ascio\v2;

class SearchDnsSecKeyResponse
{

    /**
     * @var Response $SearchDnsSecKeyResult
     */
    protected $SearchDnsSecKeyResult = null;

    /**
     * @var ArrayOfDnsSecKey $dnsSecKeys
     */
    protected $dnsSecKeys = null;

    /**
     * @param Response $SearchDnsSecKeyResult
     * @param ArrayOfDnsSecKey $dnsSecKeys
     */
    public function __construct($SearchDnsSecKeyResult, $dnsSecKeys)
    {
      $this->SearchDnsSecKeyResult = $SearchDnsSecKeyResult;
      $this->dnsSecKeys = $dnsSecKeys;
    }

    /**
     * @return Response
     */
    public function getSearchDnsSecKeyResult()
    {
      return $this->SearchDnsSecKeyResult;
    }

    /**
     * @param Response $SearchDnsSecKeyResult
     * @return \ascio\v2\SearchDnsSecKeyResponse
     */
    public function setSearchDnsSecKeyResult($SearchDnsSecKeyResult)
    {
      $this->SearchDnsSecKeyResult = $SearchDnsSecKeyResult;
      return $this;
    }

    /**
     * @return ArrayOfDnsSecKey
     */
    public function getDnsSecKeys()
    {
      return $this->dnsSecKeys;
    }

    /**
     * @param ArrayOfDnsSecKey $dnsSecKeys
     * @return \ascio\v2\SearchDnsSecKeyResponse
     */
    public function setDnsSecKeys($dnsSecKeys)
    {
      $this->dnsSecKeys = $dnsSecKeys;
      return $this;
    }

}
