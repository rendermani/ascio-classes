<?php

namespace ascio\v2;

class GetOrderResponse
{

    /**
     * @var Response $GetOrderResult
     */
    protected $GetOrderResult = null;

    /**
     * @var Order $order
     */
    protected $order = null;

    /**
     * @param Response $GetOrderResult
     * @param Order $order
     */
    public function __construct($GetOrderResult, $order)
    {
      $this->GetOrderResult = $GetOrderResult;
      $this->order = $order;
    }

    /**
     * @return Response
     */
    public function getGetOrderResult()
    {
      return $this->GetOrderResult;
    }

    /**
     * @param Response $GetOrderResult
     * @return \ascio\v2\GetOrderResponse
     */
    public function setGetOrderResult($GetOrderResult)
    {
      $this->GetOrderResult = $GetOrderResult;
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
     * @return \ascio\v2\GetOrderResponse
     */
    public function setOrder($order)
    {
      $this->order = $order;
      return $this;
    }

}
