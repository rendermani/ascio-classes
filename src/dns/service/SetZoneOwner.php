<?php

namespace ascio\dns;

class SetZoneOwner
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
     * @param string $zoneName
     * @param string $owner
     */
    public function __construct($zoneName, $owner)
    {
      $this->zoneName = $zoneName;
      $this->owner = $owner;
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
     * @return \ascio\dns\SetZoneOwner
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
     * @return \ascio\dns\SetZoneOwner
     */
    public function setOwner($owner)
    {
      $this->owner = $owner;
      return $this;
    }

}
