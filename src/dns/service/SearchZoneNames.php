<?php

namespace ascio\dns;

class SearchZoneNames
{

    /**
     * @var ArrayOfSearchZoneClause $searchZoneClauses
     */
    protected $searchZoneClauses = null;

    /**
     * @param ArrayOfSearchZoneClause $searchZoneClauses
     */
    public function __construct($searchZoneClauses)
    {
      $this->searchZoneClauses = $searchZoneClauses;
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
     * @return \ascio\dns\SearchZoneNames
     */
    public function setSearchZoneClauses($searchZoneClauses)
    {
      $this->searchZoneClauses = $searchZoneClauses;
      return $this;
    }

}
