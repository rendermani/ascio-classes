<?php

namespace ascio\v3;

class DefensiveOrderRequest extends AbstractOrderRequest
{

    /**
     * @var Defensive $Defensive
     */
    protected $Defensive = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return Defensive
     */
    public function getDefensive()
    {
      return $this->Defensive;
    }

    /**
     * @param Defensive $Defensive
     * @return \ascio\v3\DefensiveOrderRequest
     */
    public function setDefensive($Defensive)
    {
      $this->Defensive = $Defensive;
      return $this;
    }

}
