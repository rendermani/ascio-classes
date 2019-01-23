<?php

namespace ascio\v2;

class CreateSupportOrderResponse
{

    /**
     * @var Response $CreateSupportOrderResult
     */
    protected $CreateSupportOrderResult = null;

    /**
     * @var string $orderId
     */
    protected $orderId = null;

    /**
     * @param Response $CreateSupportOrderResult
     * @param string $orderId
     */
    public function __construct($CreateSupportOrderResult, $orderId)
    {
      $this->CreateSupportOrderResult = $CreateSupportOrderResult;
      $this->orderId = $orderId;
    }

    /**
     * @return Response
     */
    public function getCreateSupportOrderResult()
    {
      return $this->CreateSupportOrderResult;
    }

    /**
     * @param Response $CreateSupportOrderResult
     * @return \ascio\v2\CreateSupportOrderResponse
     */
    public function setCreateSupportOrderResult($CreateSupportOrderResult)
    {
      $this->CreateSupportOrderResult = $CreateSupportOrderResult;
      return $this;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
      return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return \ascio\v2\CreateSupportOrderResponse
     */
    public function setOrderId($orderId)
    {
      $this->orderId = $orderId;
      return $this;
    }

}
