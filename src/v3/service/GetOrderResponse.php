<?php

namespace ascio\v3;

class GetOrderResponse extends AbstractResponse
{

    /**
     * @var OrderInfo $OrderInfo
     */
    protected $OrderInfo = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return OrderInfo
     */
    public function getOrderInfo()
    {
      return $this->OrderInfo;
    }

    /**
     * @param OrderInfo $OrderInfo
     * @return \ascio\v3\GetOrderResponse
     */
    public function setOrderInfo($OrderInfo)
    {
      $this->OrderInfo = $OrderInfo;
      return $this;
    }

}
