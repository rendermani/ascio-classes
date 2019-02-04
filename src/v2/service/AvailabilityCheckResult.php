<?php

namespace ascio\v2;

class AvailabilityCheckResult
{

    /**
     * @var string $DomainName
     */
    protected $DomainName = null;

    /**
     * @var QualityType $Quality
     */
    protected $Quality = null;

    /**
     * @var int $StatusCode
     */
    protected $StatusCode = null;

    /**
     * @var string $StatusMessage
     */
    protected $StatusMessage = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getDomainName()
    {
      return $this->DomainName;
    }

    /**
     * @param string $DomainName
     * @return \ascio\v2\AvailabilityCheckResult
     */
    public function setDomainName($DomainName)
    {
      $this->DomainName = $DomainName;
      return $this;
    }

    /**
     * @return QualityType
     */
    public function getQuality()
    {
      return $this->Quality;
    }

    /**
     * @param QualityType $Quality
     * @return \ascio\v2\AvailabilityCheckResult
     */
    public function setQuality($Quality)
    {
      $this->Quality = $Quality;
      return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
      return $this->StatusCode;
    }

    /**
     * @param int $StatusCode
     * @return \ascio\v2\AvailabilityCheckResult
     */
    public function setStatusCode($StatusCode)
    {
      $this->StatusCode = $StatusCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
      return $this->StatusMessage;
    }

    /**
     * @param string $StatusMessage
     * @return \ascio\v2\AvailabilityCheckResult
     */
    public function setStatusMessage($StatusMessage)
    {
      $this->StatusMessage = $StatusMessage;
      return $this;
    }

}
