<?php

namespace ascio\dns;

class ArrayOfSearchUserClause
{

    /**
     * @var SearchUserClause[] $SearchUserClause
     */
    protected $SearchUserClause = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return SearchUserClause[]
     */
    public function getSearchUserClause()
    {
      return $this->SearchUserClause;
    }

    /**
     * @param SearchUserClause[] $SearchUserClause
     * @return \ascio\dns\ArrayOfSearchUserClause
     */
    public function setSearchUserClause(array $SearchUserClause)
    {
      $this->SearchUserClause = $SearchUserClause;
      return $this;
    }

}
