<?php

namespace ascio\dns;

class MX extends Record
{

    /**
     * @var int $Priority
     */
    protected $Priority = null;

    /**
     * @param int $Id
     * @param int $Serial
     * @param int $TTL
     * @param int $Priority
     */
    public function __construct($Id, $Serial, $TTL, $Priority)
    {
      parent::__construct($Id, $Serial, $TTL);
      $this->Priority = $Priority;
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
