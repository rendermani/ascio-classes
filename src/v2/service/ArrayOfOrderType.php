<?php

namespace ascio\v2;

class ArrayOfOrderType
{

    /**
     * @var OrderType[] $OrderType
     */
    protected $OrderType = null;

    /**
     * @param OrderType[] $OrderType
     */
    public function __construct(array $OrderType)
    {
      $this->OrderType = $OrderType;
    }

    /**
     * @return OrderType[]
     */
    public function getOrderType()
    {
      return $this->OrderType;
    }

    /**
     * @param OrderType[] $OrderType
     * @return \ascio\v2\ArrayOfOrderType
     */
    public function setOrderType(array $OrderType)
    {
      $this->OrderType = $OrderType;
      return $this;
    }

}
