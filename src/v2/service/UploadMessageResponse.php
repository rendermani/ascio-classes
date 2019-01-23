<?php

namespace ascio\v2;

class UploadMessageResponse
{

    /**
     * @var Response $UploadMessageResult
     */
    protected $UploadMessageResult = null;

    /**
     * @param Response $UploadMessageResult
     */
    public function __construct($UploadMessageResult)
    {
      $this->UploadMessageResult = $UploadMessageResult;
    }

    /**
     * @return Response
     */
    public function getUploadMessageResult()
    {
      return $this->UploadMessageResult;
    }

    /**
     * @param Response $UploadMessageResult
     * @return \ascio\v2\UploadMessageResponse
     */
    public function setUploadMessageResult($UploadMessageResult)
    {
      $this->UploadMessageResult = $UploadMessageResult;
      return $this;
    }

}
