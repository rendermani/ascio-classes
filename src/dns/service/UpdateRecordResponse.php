<?php

namespace ascio\dns;

class UpdateRecordResponse
{

    /**
     * @var Response $UpdateRecordResult
     */
    protected $UpdateRecordResult = null;

    /**
     * @param Response $UpdateRecordResult
     */
    public function __construct($UpdateRecordResult)
    {
      $this->UpdateRecordResult = $UpdateRecordResult;
    }

    /**
     * @return Response
     */
    public function getUpdateRecordResult()
    {
      return $this->UpdateRecordResult;
    }

    /**
     * @param Response $UpdateRecordResult
     * @return \ascio\dns\UpdateRecordResponse
     */
    public function setUpdateRecordResult($UpdateRecordResult)
    {
      $this->UpdateRecordResult = $UpdateRecordResult;
      return $this;
    }

}
