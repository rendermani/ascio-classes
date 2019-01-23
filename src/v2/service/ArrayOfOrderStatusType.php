<?php

namespace ascio\v2;

class ArrayOfOrderStatusType
{

    /**
     * @var OrderStatusType[] $OrderStatusType
     */
    protected $OrderStatusType = null;

    /**
     * @param OrderStatusType[] $OrderStatusType
     */
    public function __construct(array $OrderStatusType)
    {
      $this->OrderStatusType = $OrderStatusType;
    }

    /**
     * @return OrderStatusType[]
     */
    public function getOrderStatusType()
    {
      return $this->OrderStatusType;
    }

    /**
     * @param OrderStatusType[] $OrderStatusType
     * @return \ascio\v2\ArrayOfOrderStatusType
     */
    public function setOrderStatusType(array $OrderStatusType)
    {
      $this->OrderStatusType = $OrderStatusType;
      return $this;
    }

}
