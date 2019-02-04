<?php

namespace ascio\v2;

class AvailabilityInfo
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
     * @var QualityType $quality
     */
    protected $quality = null;

    /**
     * @param string $sessionId
     * @param string $domainName
     * @param QualityType $quality
     */
    public function __construct($sessionId, $domainName, $quality)
    {
      $this->sessionId = $sessionId;
      $this->domainName = $domainName;
      $this->quality = $quality;
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
     * @return \ascio\v2\AvailabilityInfo
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
     * @return \ascio\v2\AvailabilityInfo
     */
    public function setDomainName($domainName)
    {
      $this->domainName = $domainName;
      return $this;
    }

    /**
     * @return QualityType
     */
    public function getQuality()
    {
      return $this->quality;
    }

    /**
     * @param QualityType $quality
     * @return \ascio\v2\AvailabilityInfo
     */
    public function setQuality($quality)
    {
      $this->quality = $quality;
      return $this;
    }

}
