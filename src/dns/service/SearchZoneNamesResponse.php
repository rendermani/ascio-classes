<?php

namespace ascio\dns;

class SearchZoneNamesResponse
{

    /**
     * @var Response $SearchZoneNamesResult
     */
    protected $SearchZoneNamesResult = null;

    /**
     * @var ArrayOfstring $zoneNames
     */
    protected $zoneNames = null;

    /**
     * @param Response $SearchZoneNamesResult
     * @param ArrayOfstring $zoneNames
     */
    public function __construct($SearchZoneNamesResult, $zoneNames)
    {
      $this->SearchZoneNamesResult = $SearchZoneNamesResult;
      $this->zoneNames = $zoneNames;
    }

    /**
     * @return Response
     */
    public function getSearchZoneNamesResult()
    {
      return $this->SearchZoneNamesResult;
    }

    /**
     * @param Response $SearchZoneNamesResult
     * @return \ascio\dns\SearchZoneNamesResponse
     */
    public function setSearchZoneNamesResult($SearchZoneNamesResult)
    {
      $this->SearchZoneNamesResult = $SearchZoneNamesResult;
      return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getZoneNames()
    {
      return $this->zoneNames;
    }

    /**
     * @param ArrayOfstring $zoneNames
     * @return \ascio\dns\SearchZoneNamesResponse
     */
    public function setZoneNames($zoneNames)
    {
      $this->zoneNames = $zoneNames;
      return $this;
    }

}
