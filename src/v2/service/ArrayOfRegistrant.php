<?php

namespace ascio\v2;

class ArrayOfRegistrant
{

    /**
     * @var Registrant[] $Registrant
     */
    protected $Registrant = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Registrant[]
     */
    public function getRegistrant()
    {
      return $this->Registrant;
    }

    /**
     * @param Registrant[] $Registrant
     * @return \ascio\v2\ArrayOfRegistrant
     */
    public function setRegistrant(array $Registrant)
    {
      $this->Registrant = $Registrant;
      return $this;
    }

}
