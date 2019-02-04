<?php

namespace ascio\v3;

class NameWatchOrderRequest extends AbstractOrderRequest
{

    /**
     * @var NameWatch $NameWatch
     */
    protected $NameWatch = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return NameWatch
     */
    public function getNameWatch()
    {
      return $this->NameWatch;
    }

    /**
     * @param NameWatch $NameWatch
     * @return \ascio\v3\NameWatchOrderRequest
     */
    public function setNameWatch($NameWatch)
    {
      $this->NameWatch = $NameWatch;
      return $this;
    }

}
