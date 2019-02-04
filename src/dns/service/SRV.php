<?php

namespace ascio\dns;

class SRV extends Record
{

    /**
     * @var int $Port
     */
    protected $Port = null;

    /**
     * @var int $Priority
     */
    protected $Priority = null;

    /**
     * @var int $Weight
     */
    protected $Weight = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getPort()
    {
      return $this->Port;
    }

    /**
     * @param int $Port
     * @return \ascio\dns\SRV
     */
    public function setPort($Port)
    {
      $this->Port = $Port;
      return $this;
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
     * @return \ascio\dns\SRV
     */
    public function setPriority($Priority)
    {
      $this->Priority = $Priority;
      return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
      return $this->Weight;
    }

    /**
     * @param int $Weight
     * @return \ascio\dns\SRV
     */
    public function setWeight($Weight)
    {
      $this->Weight = $Weight;
      return $this;
    }

}
