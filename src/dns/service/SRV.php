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

    /**
     * @param int $Id
     * @param int $Serial
     * @param int $TTL
     * @param int $Port
     * @param int $Priority
     * @param int $Weight
     */
    public function __construct($Id, $Serial, $TTL, $Port, $Priority, $Weight)
    {
      parent::__construct($Id, $Serial, $TTL);
      $this->Port = $Port;
      $this->Priority = $Priority;
      $this->Weight = $Weight;
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
