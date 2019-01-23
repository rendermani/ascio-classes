<?php

namespace ascio\dns;

class SearchUser
{

    /**
     * @var ArrayOfSearchUserClause $searchUserClauses
     */
    protected $searchUserClauses = null;

    /**
     * @param ArrayOfSearchUserClause $searchUserClauses
     */
    public function __construct($searchUserClauses)
    {
      $this->searchUserClauses = $searchUserClauses;
    }

    /**
     * @return ArrayOfSearchUserClause
     */
    public function getSearchUserClauses()
    {
      return $this->searchUserClauses;
    }

    /**
     * @param ArrayOfSearchUserClause $searchUserClauses
     * @return \ascio\dns\SearchUser
     */
    public function setSearchUserClauses($searchUserClauses)
    {
      $this->searchUserClauses = $searchUserClauses;
      return $this;
    }

}
