<?php

namespace ascio\dns;

class SearchZone
{

    /**
     * @var ArrayOfSearchZoneClause $searchZoneClauses
     */
    protected $searchZoneClauses = null;

    /**
     * @var ZoneInfoLevel $zoneInfoLevel
     */
    protected $zoneInfoLevel = null;

    /**
     * @param ArrayOfSearchZoneClause $searchZoneClauses
     * @param ZoneInfoLevel $zoneInfoLevel
     */
    public function __construct($searchZoneClauses, $zoneInfoLevel)
    {
      $this->searchZoneClauses = $searchZoneClauses;
      $this->zoneInfoLevel = $zoneInfoLevel;
    }

    /**
     * @return ArrayOfSearchZoneClause
     */
    public function getSearchZoneClauses()
    {
      return $this->searchZoneClauses;
    }

    /**
     * @param ArrayOfSearchZoneClause $searchZoneClauses
     * @return \ascio\dns\SearchZone
     */
    public function setSearchZoneClauses($searchZoneClauses)
    {
      $this->searchZoneClauses = $searchZoneClauses;
      return $this;
    }

    /**
     * @return ZoneInfoLevel
     */
    public function getZoneInfoLevel()
    {
      return $this->zoneInfoLevel;
    }

    /**
     * @param ZoneInfoLevel $zoneInfoLevel
     * @return \ascio\dns\SearchZone
     */
    public function setZoneInfoLevel($zoneInfoLevel)
    {
      $this->zoneInfoLevel = $zoneInfoLevel;
      return $this;
    }

}
