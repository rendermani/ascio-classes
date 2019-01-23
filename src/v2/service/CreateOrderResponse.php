<?php

namespace ascio\v2;

class CreateOrderResponse
{

    /**
     * @var Response $CreateOrderResult
     */
    protected $CreateOrderResult = null;

    /**
     * @var Order $order
     */
    protected $order = null;

    /**
     * @param Response $CreateOrderResult
     * @param Order $order
     */
    public function __construct($CreateOrderResult, $order)
    {
      $this->CreateOrderResult = $CreateOrderResult;
      $this->order = $order;
    }

    /**
     * @return Response
     */
    public function getCreateOrderResult()
    {
      return $this->CreateOrderResult;
    }

    /**
     * @param Response $CreateOrderResult
     * @return \ascio\v2\CreateOrderResponse
     */
    public function setCreateOrderResult($CreateOrderResult)
    {
      $this->CreateOrderResult = $CreateOrderResult;
      return $this;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
      return $this->order;
    }

    /**
     * @param Order $order
     * @return \ascio\v2\CreateOrderResponse
     */
    public function setOrder($order)
    {
      $this->order = $order;
      return $this;
    }

}
