<?php

namespace ascio\v2;

class ArrayOfDomain
{

    /**
     * @var Domain[] $Domain
     */
    protected $Domain = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Domain[]
     */
    public function getDomain()
    {
      return $this->Domain;
    }

    /**
     * @param Domain[] $Domain
     * @return \ascio\v2\ArrayOfDomain
     */
    public function setDomain(array $Domain)
    {
      $this->Domain = $Domain;
      return $this;
    }

}
