<?php

namespace ascio\dns;

class ArrayOfSearchZoneClause
{

    /**
     * @var SearchZoneClause[] $SearchZoneClause
     */
    protected $SearchZoneClause = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return SearchZoneClause[]
     */
    public function getSearchZoneClause()
    {
      return $this->SearchZoneClause;
    }

    /**
     * @param SearchZoneClause[] $SearchZoneClause
     * @return \ascio\dns\ArrayOfSearchZoneClause
     */
    public function setSearchZoneClause(array $SearchZoneClause)
    {
      $this->SearchZoneClause = $SearchZoneClause;
      return $this;
    }

}
