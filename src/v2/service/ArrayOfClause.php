<?php

namespace ascio\v2;

class ArrayOfClause
{

    /**
     * @var Clause[] $Clause
     */
    protected $Clause = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Clause[]
     */
    public function getClause()
    {
      return $this->Clause;
    }

    /**
     * @param Clause[] $Clause
     * @return \ascio\v2\ArrayOfClause
     */
    public function setClause(array $Clause)
    {
      $this->Clause = $Clause;
      return $this;
    }

}
