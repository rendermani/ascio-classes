<?php

namespace ascio\v2;

class GetRegistrantVerificationInfoResponse
{

    /**
     * @var Response $GetRegistrantVerificationInfoResult
     */
    protected $GetRegistrantVerificationInfoResult = null;

    /**
     * @var RegistrantVerificationInfo $verificationInfo
     */
    protected $verificationInfo = null;

    /**
     * @param Response $GetRegistrantVerificationInfoResult
     * @param RegistrantVerificationInfo $verificationInfo
     */
    public function __construct($GetRegistrantVerificationInfoResult, $verificationInfo)
    {
      $this->GetRegistrantVerificationInfoResult = $GetRegistrantVerificationInfoResult;
      $this->verificationInfo = $verificationInfo;
    }

    /**
     * @return Response
     */
    public function getGetRegistrantVerificationInfoResult()
    {
      return $this->GetRegistrantVerificationInfoResult;
    }

    /**
     * @param Response $GetRegistrantVerificationInfoResult
     * @return \ascio\v2\GetRegistrantVerificationInfoResponse
     */
    public function setGetRegistrantVerificationInfoResult($GetRegistrantVerificationInfoResult)
    {
      $this->GetRegistrantVerificationInfoResult = $GetRegistrantVerificationInfoResult;
      return $this;
    }

    /**
     * @return RegistrantVerificationInfo
     */
    public function getVerificationInfo()
    {
      return $this->verificationInfo;
    }

    /**
     * @param RegistrantVerificationInfo $verificationInfo
     * @return \ascio\v2\GetRegistrantVerificationInfoResponse
     */
    public function setVerificationInfo($verificationInfo)
    {
      $this->verificationInfo = $verificationInfo;
      return $this;
    }

}
