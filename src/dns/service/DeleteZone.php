<?php

namespace ascio\dns;

class DeleteZone
{

    /**
     * @var string $zoneName
     */
    protected $zoneName = null;

    /**
     * @param string $zoneName
     */
    public function __construct($zoneName)
    {
      $this->zoneName = $zoneName;
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
     * @return \ascio\dns\DeleteZone
     */
    public function setZoneName($zoneName)
    {
      $this->zoneName = $zoneName;
      return $this;
    }

}
