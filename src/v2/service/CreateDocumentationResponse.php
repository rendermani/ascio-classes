<?php

namespace ascio\v2;

class CreateDocumentationResponse
{

    /**
     * @var Response $CreateDocumentationResult
     */
    protected $CreateDocumentationResult = null;

    /**
     * @var int $documentationId
     */
    protected $documentationId = null;

    /**
     * @param Response $CreateDocumentationResult
     * @param int $documentationId
     */
    public function __construct($CreateDocumentationResult, $documentationId)
    {
      $this->CreateDocumentationResult = $CreateDocumentationResult;
      $this->documentationId = $documentationId;
    }

    /**
     * @return Response
     */
    public function getCreateDocumentationResult()
    {
      return $this->CreateDocumentationResult;
    }

    /**
     * @param Response $CreateDocumentationResult
     * @return \ascio\v2\CreateDocumentationResponse
     */
    public function setCreateDocumentationResult($CreateDocumentationResult)
    {
      $this->CreateDocumentationResult = $CreateDocumentationResult;
      return $this;
    }

    /**
     * @return int
     */
    public function getDocumentationId()
    {
      return $this->documentationId;
    }

    /**
     * @param int $documentationId
     * @return \ascio\v2\CreateDocumentationResponse
     */
    public function setDocumentationId($documentationId)
    {
      $this->documentationId = $documentationId;
      return $this;
    }

}
