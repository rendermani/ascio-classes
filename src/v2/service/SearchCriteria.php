<?php

namespace ascio\v2;

class SearchCriteria
{

    /**
     * @var ArrayOfClause $Clauses
     */
    protected $Clauses = null;

    /**
     * @var SearchModeType $Mode
     */
    protected $Mode = null;

    /**
     * @var ArrayOfstring $Withoutstates
     */
    protected $Withoutstates = null;

    /**
     * @var ArrayOfstring $Withstates
     */
    protected $Withstates = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfClause
     */
    public function getClauses()
    {
      return $this->Clauses;
    }

    /**
     * @param ArrayOfClause $Clauses
     * @return \ascio\v2\SearchCriteria
     */
    public function setClauses($Clauses)
    {
      $this->Clauses = $Clauses;
      return $this;
    }

    /**
     * @return SearchModeType
     */
    public function getMode()
    {
      return $this->Mode;
    }

    /**
     * @param SearchModeType $Mode
     * @return \ascio\v2\SearchCriteria
     */
    public function setMode($Mode)
    {
      $this->Mode = $Mode;
      return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getWithoutstates()
    {
      return $this->Withoutstates;
    }

    /**
     * @param ArrayOfstring $Withoutstates
     * @return \ascio\v2\SearchCriteria
     */
    public function setWithoutstates($Withoutstates)
    {
      $this->Withoutstates = $Withoutstates;
      return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getWithstates()
    {
      return $this->Withstates;
    }

    /**
     * @param ArrayOfstring $Withstates
     * @return \ascio\v2\SearchCriteria
     */
    public function setWithstates($Withstates)
    {
      $this->Withstates = $Withstates;
      return $this;
    }

}
