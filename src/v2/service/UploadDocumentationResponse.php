<?php

namespace ascio\v2;

class UploadDocumentationResponse
{

    /**
     * @var Response $UploadDocumentationResult
     */
    protected $UploadDocumentationResult = null;

    /**
     * @param Response $UploadDocumentationResult
     */
    public function __construct($UploadDocumentationResult)
    {
      $this->UploadDocumentationResult = $UploadDocumentationResult;
    }

    /**
     * @return Response
     */
    public function getUploadDocumentationResult()
    {
      return $this->UploadDocumentationResult;
    }

    /**
     * @param Response $UploadDocumentationResult
     * @return \ascio\v2\UploadDocumentationResponse
     */
    public function setUploadDocumentationResult($UploadDocumentationResult)
    {
      $this->UploadDocumentationResult = $UploadDocumentationResult;
      return $this;
    }

}
