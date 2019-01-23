<?php

namespace ascio\dns;

class SearchZoneResponse
{

    /**
     * @var Response $SearchZoneResult
     */
    protected $SearchZoneResult = null;

    /**
     * @var ArrayOfZone $zones
     */
    protected $zones = null;

    /**
     * @param Response $SearchZoneResult
     * @param ArrayOfZone $zones
     */
    public function __construct($SearchZoneResult, $zones)
    {
      $this->SearchZoneResult = $SearchZoneResult;
      $this->zones = $zones;
    }

    /**
     * @return Response
     */
    public function getSearchZoneResult()
    {
      return $this->SearchZoneResult;
    }

    /**
     * @param Response $SearchZoneResult
     * @return \ascio\dns\SearchZoneResponse
     */
    public function setSearchZoneResult($SearchZoneResult)
    {
      $this->SearchZoneResult = $SearchZoneResult;
      return $this;
    }

    /**
     * @return ArrayOfZone
     */
    public function getZones()
    {
      return $this->zones;
    }

    /**
     * @param ArrayOfZone $zones
     * @return \ascio\dns\SearchZoneResponse
     */
    public function setZones($zones)
    {
      $this->zones = $zones;
      return $this;
    }

}
