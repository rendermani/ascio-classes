<?php

namespace ascio\v2;

class Price
{

    /**
     * @var OrderType $OrderType
     */
    protected $OrderType = null;

    /**
     * @var int $Period
     */
    protected $Period = null;

    /**
     * @var float $Price
     */
    protected $Price = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return OrderType
     */
    public function getOrderType()
    {
      return $this->OrderType;
    }

    /**
     * @param OrderType $OrderType
     * @return \ascio\v2\Price
     */
    public function setOrderType($OrderType)
    {
      $this->OrderType = $OrderType;
      return $this;
    }

    /**
     * @return int
     */
    public function getPeriod()
    {
      return $this->Period;
    }

    /**
     * @param int $Period
     * @return \ascio\v2\Price
     */
    public function setPeriod($Period)
    {
      $this->Period = $Period;
      return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
      return $this->Price;
    }

    /**
     * @param float $Price
     * @return \ascio\v2\Price
     */
    public function setPrice($Price)
    {
      $this->Price = $Price;
      return $this;
    }

}
