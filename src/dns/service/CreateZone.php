<?php

namespace ascio\dns;

class CreateZone
{

    /**
     * @var string $zoneName
     */
    protected $zoneName = null;

    /**
     * @var string $owner
     */
    protected $owner = null;

    /**
     * @var ArrayOfRecord $records
     */
    protected $records = null;

    /**
     * @param string $zoneName
     * @param string $owner
     * @param ArrayOfRecord $records
     */
    public function __construct($zoneName, $owner, $records)
    {
      $this->zoneName = $zoneName;
      $this->owner = $owner;
      $this->records = $records;
    }

    /**
     * @return string
     */
    public function getZoneName()
    {
      return $this->zoneName;
    }

    /**
     * @param string $zoneName
     * @return \ascio\dns\CreateZone
     */
    public function setZoneName($zoneName)
    {
      $this->zoneName = $zoneName;
      return $this;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
      return $this->owner;
    }

    /**
     * @param string $owner
     * @return \ascio\dns\CreateZone
     */
    public function setOwner($owner)
    {
      $this->owner = $owner;
      return $this;
    }

    /**
     * @return ArrayOfRecord
     */
    public function getRecords()
    {
      return $this->records;
    }

    /**
     * @param ArrayOfRecord $records
     * @return \ascio\dns\CreateZone
     */
    public function setRecords($records)
    {
      $this->records = $records;
      return $this;
    }

}
