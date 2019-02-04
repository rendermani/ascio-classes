<?php

namespace ascio\dns;

class MX extends Record
{

    /**
     * @var int $Priority
     */
    protected $Priority = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getPriority()
    {
      return $this->Priority;
    }

    /**
     * @param int $Priority
     * @return \ascio\dns\MX
     */
    public function setPriority($Priority)
    {
      $this->Priority = $Priority;
      return $this;
    }

}
