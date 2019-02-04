<?php

namespace ascio\v3;

class GetOrdersResponse extends AbstractResponse
{

    /**
     * @var int $TotalCount
     */
    protected $TotalCount = null;

    /**
     * @var ArrayOfOrderInfo $OrdersInfo
     */
    protected $OrdersInfo = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
      return $this->TotalCount;
    }

    /**
     * @param int $TotalCount
     * @return \ascio\v3\GetOrdersResponse
     */
    public function setTotalCount($TotalCount)
    {
      $this->TotalCount = $TotalCount;
      return $this;
    }

    /**
     * @return ArrayOfOrderInfo
     */
    public function getOrdersInfo()
    {
      return $this->OrdersInfo;
    }

    /**
     * @param ArrayOfOrderInfo $OrdersInfo
     * @return \ascio\v3\GetOrdersResponse
     */
    public function setOrdersInfo($OrdersInfo)
    {
      $this->OrdersInfo = $OrdersInfo;
      return $this;
    }

}
