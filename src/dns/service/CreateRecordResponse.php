<?php

namespace ascio\dns;

class CreateRecordResponse
{

    /**
     * @var Response $CreateRecordResult
     */
    protected $CreateRecordResult = null;

    /**
     * @var int $recordId
     */
    protected $recordId = null;

    /**
     * @param Response $CreateRecordResult
     * @param int $recordId
     */
    public function __construct($CreateRecordResult, $recordId)
    {
      $this->CreateRecordResult = $CreateRecordResult;
      $this->recordId = $recordId;
    }

    /**
     * @return Response
     */
    public function getCreateRecordResult()
    {
      return $this->CreateRecordResult;
    }

    /**
     * @param Response $CreateRecordResult
     * @return \ascio\dns\CreateRecordResponse
     */
    public function setCreateRecordResult($CreateRecordResult)
    {
      $this->CreateRecordResult = $CreateRecordResult;
      return $this;
    }

    /**
     * @return int
     */
    public function getRecordId()
    {
      return $this->recordId;
    }

    /**
     * @param int $recordId
     * @return \ascio\dns\CreateRecordResponse
     */
    public function setRecordId($recordId)
    {
      $this->recordId = $recordId;
      return $this;
    }

}
