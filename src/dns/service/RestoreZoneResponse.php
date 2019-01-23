<?php

namespace ascio\dns;

class RestoreZoneResponse
{

    /**
     * @var Response $RestoreZoneResult
     */
    protected $RestoreZoneResult = null;

    /**
     * @var Zone $zone
     */
    protected $zone = null;

    /**
     * @param Response $RestoreZoneResult
     * @param Zone $zone
     */
    public function __construct($RestoreZoneResult, $zone)
    {
      $this->RestoreZoneResult = $RestoreZoneResult;
      $this->zone = $zone;
    }

    /**
     * @return Response
     */
    public function getRestoreZoneResult()
    {
      return $this->RestoreZoneResult;
    }

    /**
     * @param Response $RestoreZoneResult
     * @return \ascio\dns\RestoreZoneResponse
     */
    public function setRestoreZoneResult($RestoreZoneResult)
    {
      $this->RestoreZoneResult = $RestoreZoneResult;
      return $this;
    }

    /**
     * @return Zone
     */
    public function getZone()
    {
      return $this->zone;
    }

    /**
     * @param Zone $zone
     * @return \ascio\dns\RestoreZoneResponse
     */
    public function setZone($zone)
    {
      $this->zone = $zone;
      return $this;
    }

}
