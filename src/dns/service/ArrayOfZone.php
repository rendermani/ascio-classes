<?php

namespace ascio\dns;

class ArrayOfZone
{

    /**
     * @var Zone[] $Zone
     */
    protected $Zone = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Zone[]
     */
    public function getZone()
    {
      return $this->Zone;
    }

    /**
     * @param Zone[] $Zone
     * @return \ascio\dns\ArrayOfZone
     */
    public function setZone(array $Zone)
    {
      $this->Zone = $Zone;
      return $this;
    }

}
