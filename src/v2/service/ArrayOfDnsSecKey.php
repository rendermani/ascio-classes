<?php

namespace ascio\v2;

class ArrayOfDnsSecKey
{

    /**
     * @var DnsSecKey[] $DnsSecKey
     */
    protected $DnsSecKey = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DnsSecKey[]
     */
    public function getDnsSecKey()
    {
      return $this->DnsSecKey;
    }

    /**
     * @param DnsSecKey[] $DnsSecKey
     * @return \ascio\v2\ArrayOfDnsSecKey
     */
    public function setDnsSecKey(array $DnsSecKey)
    {
      $this->DnsSecKey = $DnsSecKey;
      return $this;
    }

}
