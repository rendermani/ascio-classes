<?php

namespace ascio\dns;

class Response
{

    /**
     * @var int $StatusCode
     */
    protected $StatusCode = null;

    /**
     * @var string $StatusMessage
     */
    protected $StatusMessage = null;

    /**
     * @var string $TechnicalGuid
     */
    protected $TechnicalGuid = null;

    /**
     * @var string $TrackingReference
     */
    protected $TrackingReference = null;

    /**
     * @var ArrayOfstring $Values
     */
    protected $Values = null;

    
    public function __construct()
    {
    
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
     * @return \ascio\dns\Response
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
     * @return \ascio\dns\Response
     */
    public function setStatusMessage($StatusMessage)
    {
      $this->StatusMessage = $StatusMessage;
      return $this;
    }

    /**
     * @return string
     */
    public function getTechnicalGuid()
    {
      return $this->TechnicalGuid;
    }

    /**
     * @param string $TechnicalGuid
     * @return \ascio\dns\Response
     */
    public function setTechnicalGuid($TechnicalGuid)
    {
      $this->TechnicalGuid = $TechnicalGuid;
      return $this;
    }

    /**
     * @return string
     */
    public function getTrackingReference()
    {
      return $this->TrackingReference;
    }

    /**
     * @param string $TrackingReference
     * @return \ascio\dns\Response
     */
    public function setTrackingReference($TrackingReference)
    {
      $this->TrackingReference = $TrackingReference;
      return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getValues()
    {
      return $this->Values;
    }

    /**
     * @param ArrayOfstring $Values
     * @return \ascio\dns\Response
     */
    public function setValues($Values)
    {
      $this->Values = $Values;
      return $this;
    }

}
