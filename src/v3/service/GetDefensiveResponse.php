<?php

namespace ascio\v3;

class GetDefensiveResponse extends AbstractResponse
{

    /**
     * @var DefensiveInfo $DefensiveInfo
     */
    protected $DefensiveInfo = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return DefensiveInfo
     */
    public function getDefensiveInfo()
    {
      return $this->DefensiveInfo;
    }

    /**
     * @param DefensiveInfo $DefensiveInfo
     * @return \ascio\v3\GetDefensiveResponse
     */
    public function setDefensiveInfo($DefensiveInfo)
    {
      $this->DefensiveInfo = $DefensiveInfo;
      return $this;
    }

}
