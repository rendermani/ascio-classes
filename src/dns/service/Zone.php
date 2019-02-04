<?php

namespace ascio\dns;

class Zone
{

    /**
     * @var \DateTime $CreatedDate
     */
    protected $CreatedDate = null;

    /**
     * @var string $Owner
     */
    protected $Owner = null;

    /**
     * @var ArrayOfRecord $Records
     */
    protected $Records = null;

    /**
     * @var string $ZoneName
     */
    protected $ZoneName = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
      if ($this->CreatedDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->CreatedDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $CreatedDate
     * @return \ascio\dns\Zone
     */
    public function setCreatedDate(\DateTime $CreatedDate = null)
    {
      if ($CreatedDate == null) {
       $this->CreatedDate = null;
      } else {
        $this->CreatedDate = $CreatedDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
      return $this->Owner;
    }

    /**
     * @param string $Owner
     * @return \ascio\dns\Zone
     */
    public function setOwner($Owner)
    {
      $this->Owner = $Owner;
      return $this;
    }

    /**
     * @return ArrayOfRecord
     */
    public function getRecords()
    {
      return $this->Records;
    }

    /**
     * @param ArrayOfRecord $Records
     * @return \ascio\dns\Zone
     */
    public function setRecords($Records)
    {
      $this->Records = $Records;
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
     * @return \ascio\dns\Zone
     */
    public function setZoneName($ZoneName)
    {
      $this->ZoneName = $ZoneName;
      return $this;
    }

}
