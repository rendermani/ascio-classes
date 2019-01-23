<?php

namespace ascio\v2;

class AvailabilityCheck
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var ArrayOfString $domains
     */
    protected $domains = null;

    /**
     * @var ArrayOfString $tlds
     */
    protected $tlds = null;

    /**
     * @var QualityType $quality
     */
    protected $quality = null;

    /**
     * @param string $sessionId
     * @param ArrayOfString $domains
     * @param ArrayOfString $tlds
     * @param QualityType $quality
     */
    public function __construct($sessionId, $domains, $tlds, $quality)
    {
      $this->sessionId = $sessionId;
      $this->domains = $domains;
      $this->tlds = $tlds;
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
     * @return \ascio\v2\AvailabilityCheck
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return ArrayOfString
     */
    public function getDomains()
    {
      return $this->domains;
    }

    /**
     * @param ArrayOfString $domains
     * @return \ascio\v2\AvailabilityCheck
     */
    public function setDomains($domains)
    {
      $this->domains = $domains;
      return $this;
    }

    /**
     * @return ArrayOfString
     */
    public function getTlds()
    {
      return $this->tlds;
    }

    /**
     * @param ArrayOfString $tlds
     * @return \ascio\v2\AvailabilityCheck
     */
    public function setTlds($tlds)
    {
      $this->tlds = $tlds;
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
     * @return \ascio\v2\AvailabilityCheck
     */
    public function setQuality($quality)
    {
      $this->quality = $quality;
      return $this;
    }

}
