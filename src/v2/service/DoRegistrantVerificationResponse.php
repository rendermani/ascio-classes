<?php

namespace ascio\v2;

class DoRegistrantVerificationResponse
{

    /**
     * @var Response $DoRegistrantVerificationResult
     */
    protected $DoRegistrantVerificationResult = null;

    /**
     * @param Response $DoRegistrantVerificationResult
     */
    public function __construct($DoRegistrantVerificationResult)
    {
      $this->DoRegistrantVerificationResult = $DoRegistrantVerificationResult;
    }

    /**
     * @return Response
     */
    public function getDoRegistrantVerificationResult()
    {
      return $this->DoRegistrantVerificationResult;
    }

    /**
     * @param Response $DoRegistrantVerificationResult
     * @return \ascio\v2\DoRegistrantVerificationResponse
     */
    public function setDoRegistrantVerificationResult($DoRegistrantVerificationResult)
    {
      $this->DoRegistrantVerificationResult = $DoRegistrantVerificationResult;
      return $this;
    }

}
