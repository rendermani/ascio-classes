<?php

namespace ascio\v2;

class DeleteNameServerResponse
{

    /**
     * @var Response $DeleteNameServerResult
     */
    protected $DeleteNameServerResult = null;

    /**
     * @param Response $DeleteNameServerResult
     */
    public function __construct($DeleteNameServerResult)
    {
      $this->DeleteNameServerResult = $DeleteNameServerResult;
    }

    /**
     * @return Response
     */
    public function getDeleteNameServerResult()
    {
      return $this->DeleteNameServerResult;
    }

    /**
     * @param Response $DeleteNameServerResult
     * @return \ascio\v2\DeleteNameServerResponse
     */
    public function setDeleteNameServerResult($DeleteNameServerResult)
    {
      $this->DeleteNameServerResult = $DeleteNameServerResult;
      return $this;
    }

}
