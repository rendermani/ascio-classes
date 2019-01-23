<?php

namespace ascio\v2;

class ArrayOfOrder
{

    /**
     * @var Order[] $Order
     */
    protected $Order = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Order[]
     */
    public function getOrder()
    {
      return $this->Order;
    }

    /**
     * @param Order[] $Order
     * @return \ascio\v2\ArrayOfOrder
     */
    public function setOrder(array $Order)
    {
      $this->Order = $Order;
      return $this;
    }

}
