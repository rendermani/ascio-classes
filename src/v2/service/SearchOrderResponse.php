<?php

namespace ascio\v2;

class SearchOrderResponse
{

    /**
     * @var Response $SearchOrderResult
     */
    protected $SearchOrderResult = null;

    /**
     * @var int $totalOrders
     */
    protected $totalOrders = null;

    /**
     * @var ArrayOfOrder $orders
     */
    protected $orders = null;

    /**
     * @param Response $SearchOrderResult
     * @param int $totalOrders
     * @param ArrayOfOrder $orders
     */
    public function __construct($SearchOrderResult, $totalOrders, $orders)
    {
      $this->SearchOrderResult = $SearchOrderResult;
      $this->totalOrders = $totalOrders;
      $this->orders = $orders;
    }

    /**
     * @return Response
     */
    public function getSearchOrderResult()
    {
      return $this->SearchOrderResult;
    }

    /**
     * @param Response $SearchOrderResult
     * @return \ascio\v2\SearchOrderResponse
     */
    public function setSearchOrderResult($SearchOrderResult)
    {
      $this->SearchOrderResult = $SearchOrderResult;
      return $this;
    }

    /**
     * @return int
     */
    public function getTotalOrders()
    {
      return $this->totalOrders;
    }

    /**
     * @param int $totalOrders
     * @return \ascio\v2\SearchOrderResponse
     */
    public function setTotalOrders($totalOrders)
    {
      $this->totalOrders = $totalOrders;
      return $this;
    }

    /**
     * @return ArrayOfOrder
     */
    public function getOrders()
    {
      return $this->orders;
    }

    /**
     * @param ArrayOfOrder $orders
     * @return \ascio\v2\SearchOrderResponse
     */
    public function setOrders($orders)
    {
      $this->orders = $orders;
      return $this;
    }

}
