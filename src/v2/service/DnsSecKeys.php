<?php

namespace ascio\v2;

class DnsSecKeys
{

    /**
     * @var DnsSecKey $DnsSecKey1
     */
    protected $DnsSecKey1 = null;

    /**
     * @var DnsSecKey $DnsSecKey2
     */
    protected $DnsSecKey2 = null;

    /**
     * @var DnsSecKey $DnsSecKey3
     */
    protected $DnsSecKey3 = null;

    /**
     * @var DnsSecKey $DnsSecKey4
     */
    protected $DnsSecKey4 = null;

    /**
     * @var DnsSecKey $DnsSecKey5
     */
    protected $DnsSecKey5 = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DnsSecKey
     */
    public function getDnsSecKey1()
    {
      return $this->DnsSecKey1;
    }

    /**
     * @param DnsSecKey $DnsSecKey1
     * @return \ascio\v2\DnsSecKeys
     */
    public function setDnsSecKey1($DnsSecKey1)
    {
      $this->DnsSecKey1 = $DnsSecKey1;
      return $this;
    }

    /**
     * @return DnsSecKey
     */
    public function getDnsSecKey2()
    {
      return $this->DnsSecKey2;
    }

    /**
     * @param DnsSecKey $DnsSecKey2
     * @return \ascio\v2\DnsSecKeys
     */
    public function setDnsSecKey2($DnsSecKey2)
    {
      $this->DnsSecKey2 = $DnsSecKey2;
      return $this;
    }

    /**
     * @return DnsSecKey
     */
    public function getDnsSecKey3()
    {
      return $this->DnsSecKey3;
    }

    /**
     * @param DnsSecKey $DnsSecKey3
     * @return \ascio\v2\DnsSecKeys
     */
    public function setDnsSecKey3($DnsSecKey3)
    {
      $this->DnsSecKey3 = $DnsSecKey3;
      return $this;
    }

    /**
     * @return DnsSecKey
     */
    public function getDnsSecKey4()
    {
      return $this->DnsSecKey4;
    }

    /**
     * @param DnsSecKey $DnsSecKey4
     * @return \ascio\v2\DnsSecKeys
     */
    public function setDnsSecKey4($DnsSecKey4)
    {
      $this->DnsSecKey4 = $DnsSecKey4;
      return $this;
    }

    /**
     * @return DnsSecKey
     */
    public function getDnsSecKey5()
    {
      return $this->DnsSecKey5;
    }

    /**
     * @param DnsSecKey $DnsSecKey5
     * @return \ascio\v2\DnsSecKeys
     */
    public function setDnsSecKey5($DnsSecKey5)
    {
      $this->DnsSecKey5 = $DnsSecKey5;
      return $this;
    }

}
