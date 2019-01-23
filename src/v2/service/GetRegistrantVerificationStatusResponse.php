<?php

namespace ascio\v2;

class GetRegistrantVerificationStatusResponse
{

    /**
     * @var Response $GetRegistrantVerificationStatusResult
     */
    protected $GetRegistrantVerificationStatusResult = null;

    /**
     * @var RegistrantVerificationStatus $verificationStatus
     */
    protected $verificationStatus = null;

    /**
     * @param Response $GetRegistrantVerificationStatusResult
     * @param RegistrantVerificationStatus $verificationStatus
     */
    public function __construct($GetRegistrantVerificationStatusResult, $verificationStatus)
    {
      $this->GetRegistrantVerificationStatusResult = $GetRegistrantVerificationStatusResult;
      $this->verificationStatus = $verificationStatus;
    }

    /**
     * @return Response
     */
    public function getGetRegistrantVerificationStatusResult()
    {
      return $this->GetRegistrantVerificationStatusResult;
    }

    /**
     * @param Response $GetRegistrantVerificationStatusResult
     * @return \ascio\v2\GetRegistrantVerificationStatusResponse
     */
    public function setGetRegistrantVerificationStatusResult($GetRegistrantVerificationStatusResult)
    {
      $this->GetRegistrantVerificationStatusResult = $GetRegistrantVerificationStatusResult;
      return $this;
    }

    /**
     * @return RegistrantVerificationStatus
     */
    public function getVerificationStatus()
    {
      return $this->verificationStatus;
    }

    /**
     * @param RegistrantVerificationStatus $verificationStatus
     * @return \ascio\v2\GetRegistrantVerificationStatusResponse
     */
    public function setVerificationStatus($verificationStatus)
    {
      $this->verificationStatus = $verificationStatus;
      return $this;
    }

}
