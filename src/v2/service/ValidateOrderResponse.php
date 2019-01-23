<?php

namespace ascio\v2;

class ValidateOrderResponse
{

    /**
     * @var Response $ValidateOrderResult
     */
    protected $ValidateOrderResult = null;

    /**
     * @param Response $ValidateOrderResult
     */
    public function __construct($ValidateOrderResult)
    {
      $this->ValidateOrderResult = $ValidateOrderResult;
    }

    /**
     * @return Response
     */
    public function getValidateOrderResult()
    {
      return $this->ValidateOrderResult;
    }

    /**
     * @param Response $ValidateOrderResult
     * @return \ascio\v2\ValidateOrderResponse
     */
    public function setValidateOrderResult($ValidateOrderResult)
    {
      $this->ValidateOrderResult = $ValidateOrderResult;
      return $this;
    }

}
