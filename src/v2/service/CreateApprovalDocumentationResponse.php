<?php

namespace ascio\v2;

class CreateApprovalDocumentationResponse
{

    /**
     * @var Response $CreateApprovalDocumentationResult
     */
    protected $CreateApprovalDocumentationResult = null;

    /**
     * @var string $documentationId
     */
    protected $documentationId = null;

    /**
     * @param Response $CreateApprovalDocumentationResult
     * @param string $documentationId
     */
    public function __construct($CreateApprovalDocumentationResult, $documentationId)
    {
      $this->CreateApprovalDocumentationResult = $CreateApprovalDocumentationResult;
      $this->documentationId = $documentationId;
    }

    /**
     * @return Response
     */
    public function getCreateApprovalDocumentationResult()
    {
      return $this->CreateApprovalDocumentationResult;
    }

    /**
     * @param Response $CreateApprovalDocumentationResult
     * @return \ascio\v2\CreateApprovalDocumentationResponse
     */
    public function setCreateApprovalDocumentationResult($CreateApprovalDocumentationResult)
    {
      $this->CreateApprovalDocumentationResult = $CreateApprovalDocumentationResult;
      return $this;
    }

    /**
     * @return string
     */
    public function getDocumentationId()
    {
      return $this->documentationId;
    }

    /**
     * @param string $documentationId
     * @return \ascio\v2\CreateApprovalDocumentationResponse
     */
    public function setDocumentationId($documentationId)
    {
      $this->documentationId = $documentationId;
      return $this;
    }

}
