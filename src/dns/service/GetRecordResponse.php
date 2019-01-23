<?php

namespace ascio\dns;

class GetRecordResponse
{

    /**
     * @var Response $GetRecordResult
     */
    protected $GetRecordResult = null;

    /**
     * @var Record $record
     */
    protected $record = null;

    /**
     * @param Response $GetRecordResult
     * @param Record $record
     */
    public function __construct($GetRecordResult, $record)
    {
      $this->GetRecordResult = $GetRecordResult;
      $this->record = $record;
    }

    /**
     * @return Response
     */
    public function getGetRecordResult()
    {
      return $this->GetRecordResult;
    }

    /**
     * @param Response $GetRecordResult
     * @return \ascio\dns\GetRecordResponse
     */
    public function setGetRecordResult($GetRecordResult)
    {
      $this->GetRecordResult = $GetRecordResult;
      return $this;
    }

    /**
     * @return Record
     */
    public function getRecord()
    {
      return $this->record;
    }

    /**
     * @param Record $record
     * @return \ascio\dns\GetRecordResponse
     */
    public function setRecord($record)
    {
      $this->record = $record;
      return $this;
    }

}
