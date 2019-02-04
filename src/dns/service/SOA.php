<?php

namespace ascio\dns;

class SOA extends Record
{

    /**
     * @var int $Expire
     */
    protected $Expire = null;

    /**
     * @var string $HostmasterEmail
     */
    protected $HostmasterEmail = null;

    /**
     * @var string $PrimaryNameServer
     */
    protected $PrimaryNameServer = null;

    /**
     * @var int $Refresh
     */
    protected $Refresh = null;

    /**
     * @var int $Retry
     */
    protected $Retry = null;

    /**
     * @var int $SerialUsage
     */
    protected $SerialUsage = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getExpire()
    {
      return $this->Expire;
    }

    /**
     * @param int $Expire
     * @return \ascio\dns\SOA
     */
    public function setExpire($Expire)
    {
      $this->Expire = $Expire;
      return $this;
    }

    /**
     * @return string
     */
    public function getHostmasterEmail()
    {
      return $this->HostmasterEmail;
    }

    /**
     * @param string $HostmasterEmail
     * @return \ascio\dns\SOA
     */
    public function setHostmasterEmail($HostmasterEmail)
    {
      $this->HostmasterEmail = $HostmasterEmail;
      return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryNameServer()
    {
      return $this->PrimaryNameServer;
    }

    /**
     * @param string $PrimaryNameServer
     * @return \ascio\dns\SOA
     */
    public function setPrimaryNameServer($PrimaryNameServer)
    {
      $this->PrimaryNameServer = $PrimaryNameServer;
      return $this;
    }

    /**
     * @return int
     */
    public function getRefresh()
    {
      return $this->Refresh;
    }

    /**
     * @param int $Refresh
     * @return \ascio\dns\SOA
     */
    public function setRefresh($Refresh)
    {
      $this->Refresh = $Refresh;
      return $this;
    }

    /**
     * @return int
     */
    public function getRetry()
    {
      return $this->Retry;
    }

    /**
     * @param int $Retry
     * @return \ascio\dns\SOA
     */
    public function setRetry($Retry)
    {
      $this->Retry = $Retry;
      return $this;
    }

    /**
     * @return int
     */
    public function getSerialUsage()
    {
      return $this->SerialUsage;
    }

    /**
     * @param int $SerialUsage
     * @return \ascio\dns\SOA
     */
    public function setSerialUsage($SerialUsage)
    {
      $this->SerialUsage = $SerialUsage;
      return $this;
    }

}
