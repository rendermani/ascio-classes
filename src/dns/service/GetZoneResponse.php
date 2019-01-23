<?php

namespace ascio\dns;

class GetZoneResponse
{

    /**
     * @var Response $GetZoneResult
     */
    protected $GetZoneResult = null;

    /**
     * @var Zone $zone
     */
    protected $zone = null;

    /**
     * @param Response $GetZoneResult
     * @param Zone $zone
     */
    public function __construct($GetZoneResult, $zone)
    {
      $this->GetZoneResult = $GetZoneResult;
      $this->zone = $zone;
    }

    /**
     * @return Response
     */
    public function getGetZoneResult()
    {
      return $this->GetZoneResult;
    }

    /**
     * @param Response $GetZoneResult
     * @return \ascio\dns\GetZoneResponse
     */
    public function setGetZoneResult($GetZoneResult)
    {
      $this->GetZoneResult = $GetZoneResult;
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
     * @return \ascio\dns\GetZoneResponse
     */
    public function setZone($zone)
    {
      $this->zone = $zone;
      return $this;
    }

}
