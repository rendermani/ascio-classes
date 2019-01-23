<?php

namespace ascio\v2;

class UploadRegistrantVerificationMessageResponse
{

    /**
     * @var Response $UploadRegistrantVerificationMessageResult
     */
    protected $UploadRegistrantVerificationMessageResult = null;

    /**
     * @param Response $UploadRegistrantVerificationMessageResult
     */
    public function __construct($UploadRegistrantVerificationMessageResult)
    {
      $this->UploadRegistrantVerificationMessageResult = $UploadRegistrantVerificationMessageResult;
    }

    /**
     * @return Response
     */
    public function getUploadRegistrantVerificationMessageResult()
    {
      return $this->UploadRegistrantVerificationMessageResult;
    }

    /**
     * @param Response $UploadRegistrantVerificationMessageResult
     * @return \ascio\v2\UploadRegistrantVerificationMessageResponse
     */
    public function setUploadRegistrantVerificationMessageResult($UploadRegistrantVerificationMessageResult)
    {
      $this->UploadRegistrantVerificationMessageResult = $UploadRegistrantVerificationMessageResult;
      return $this;
    }

}
