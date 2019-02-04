<?php

namespace ascio\dns;

class ZoneLogEntry
{

    /**
     * @var string $Action
     */
    protected $Action = null;

    /**
     * @var string $ActionBy
     */
    protected $ActionBy = null;

    /**
     * @var string $ActionByIpAddress
     */
    protected $ActionByIpAddress = null;

    /**
     * @var \DateTime $ActionDate
     */
    protected $ActionDate = null;

    /**
     * @var Record $Record
     */
    protected $Record = null;

    /**
     * @var string $ZoneName
     */
    protected $ZoneName = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAction()
    {
      return $this->Action;
    }

    /**
     * @param string $Action
     * @return \ascio\dns\ZoneLogEntry
     */
    public function setAction($Action)
    {
      $this->Action = $Action;
      return $this;
    }

    /**
     * @return string
     */
    public function getActionBy()
    {
      return $this->ActionBy;
    }

    /**
     * @param string $ActionBy
     * @return \ascio\dns\ZoneLogEntry
     */
    public function setActionBy($ActionBy)
    {
      $this->ActionBy = $ActionBy;
      return $this;
    }

    /**
     * @return string
     */
    public function getActionByIpAddress()
    {
      return $this->ActionByIpAddress;
    }

    /**
     * @param string $ActionByIpAddress
     * @return \ascio\dns\ZoneLogEntry
     */
    public function setActionByIpAddress($ActionByIpAddress)
    {
      $this->ActionByIpAddress = $ActionByIpAddress;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getActionDate()
    {
      if ($this->ActionDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ActionDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ActionDate
     * @return \ascio\dns\ZoneLogEntry
     */
    public function setActionDate(\DateTime $ActionDate = null)
    {
      if ($ActionDate == null) {
       $this->ActionDate = null;
      } else {
        $this->ActionDate = $ActionDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return Record
     */
    public function getRecord()
    {
      return $this->Record;
    }

    /**
     * @param Record $Record
     * @return \ascio\dns\ZoneLogEntry
     */
    public function setRecord($Record)
    {
      $this->Record = $Record;
      return $this;
    }

    /**
     * @return string
     */
    public function getZoneName()
    {
      return $this->ZoneName;
    }

    /**
     * @param string $ZoneName
     * @return \ascio\dns\ZoneLogEntry
     */
    public function setZoneName($ZoneName)
    {
      $this->ZoneName = $ZoneName;
      return $this;
    }

}
