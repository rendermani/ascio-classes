<?php

namespace ascio\v2;

class AvailabilityInfoResponse
{

    /**
     * @var Response $AvailabilityInfoResult
     */
    protected $AvailabilityInfoResult = null;

    /**
     * @var PriceInfo $PriceInfo
     */
    protected $PriceInfo = null;

    /**
     * @param Response $AvailabilityInfoResult
     * @param PriceInfo $PriceInfo
     */
    public function __construct($AvailabilityInfoResult, $PriceInfo)
    {
      $this->AvailabilityInfoResult = $AvailabilityInfoResult;
      $this->PriceInfo = $PriceInfo;
    }

    /**
     * @return Response
     */
    public function getAvailabilityInfoResult()
    {
      return $this->AvailabilityInfoResult;
    }

    /**
     * @param Response $AvailabilityInfoResult
     * @return \ascio\v2\AvailabilityInfoResponse
     */
    public function setAvailabilityInfoResult($AvailabilityInfoResult)
    {
      $this->AvailabilityInfoResult = $AvailabilityInfoResult;
      return $this;
    }

    /**
     * @return PriceInfo
     */
    public function getPriceInfo()
    {
      return $this->PriceInfo;
    }

    /**
     * @param PriceInfo $PriceInfo
     * @return \ascio\v2\AvailabilityInfoResponse
     */
    public function setPriceInfo($PriceInfo)
    {
      $this->PriceInfo = $PriceInfo;
      return $this;
    }

}
