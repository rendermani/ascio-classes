<?php

namespace ascio\v2;

class NameServer
{

    /**
     * @var \DateTime $CreDate
     */
    protected $CreDate = null;

    /**
     * @var string $Handle
     */
    protected $Handle = null;

    /**
     * @var string $HostName
     */
    protected $HostName = null;

    /**
     * @var string $IpAddress
     */
    protected $IpAddress = null;

    /**
     * @var string $Status
     */
    protected $Status = null;

    /**
     * @var string $IpV6Address
     */
    protected $IpV6Address = null;

    /**
     * @var string $Details
     */
    protected $Details = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return \DateTime
     */
    public function getCreDate()
    {
      if ($this->CreDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->CreDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $CreDate
     * @return \ascio\v2\NameServer
     */
    public function setCreDate(\DateTime $CreDate = null)
    {
      if ($CreDate == null) {
       $this->CreDate = null;
      } else {
        $this->CreDate = $CreDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return string
     */
    public function getHandle()
    {
      return $this->Handle;
    }

    /**
     * @param string $Handle
     * @return \ascio\v2\NameServer
     */
    public function setHandle($Handle)
    {
      $this->Handle = $Handle;
      return $this;
    }

    /**
     * @return string
     */
    public function getHostName()
    {
      return $this->HostName;
    }

    /**
     * @param string $HostName
     * @return \ascio\v2\NameServer
     */
    public function setHostName($HostName)
    {
      $this->HostName = $HostName;
      return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
      return $this->IpAddress;
    }

    /**
     * @param string $IpAddress
     * @return \ascio\v2\NameServer
     */
    public function setIpAddress($IpAddress)
    {
      $this->IpAddress = $IpAddress;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param string $Status
     * @return \ascio\v2\NameServer
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getIpV6Address()
    {
      return $this->IpV6Address;
    }

    /**
     * @param string $IpV6Address
     * @return \ascio\v2\NameServer
     */
    public function setIpV6Address($IpV6Address)
    {
      $this->IpV6Address = $IpV6Address;
      return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
      return $this->Details;
    }

    /**
     * @param string $Details
     * @return \ascio\v2\NameServer
     */
    public function setDetails($Details)
    {
      $this->Details = $Details;
      return $this;
    }

}
