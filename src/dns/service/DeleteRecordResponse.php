<?php

namespace ascio\dns;

class DeleteRecordResponse
{

    /**
     * @var Response $DeleteRecordResult
     */
    protected $DeleteRecordResult = null;

    /**
     * @param Response $DeleteRecordResult
     */
    public function __construct($DeleteRecordResult)
    {
      $this->DeleteRecordResult = $DeleteRecordResult;
    }

    /**
     * @return Response
     */
    public function getDeleteRecordResult()
    {
      return $this->DeleteRecordResult;
    }

    /**
     * @param Response $DeleteRecordResult
     * @return \ascio\dns\DeleteRecordResponse
     */
    public function setDeleteRecordResult($DeleteRecordResult)
    {
      $this->DeleteRecordResult = $DeleteRecordResult;
      return $this;
    }

}
