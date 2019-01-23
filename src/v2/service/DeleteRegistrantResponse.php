<?php

namespace ascio\v2;

class DeleteRegistrantResponse
{

    /**
     * @var Response $DeleteRegistrantResult
     */
    protected $DeleteRegistrantResult = null;

    /**
     * @param Response $DeleteRegistrantResult
     */
    public function __construct($DeleteRegistrantResult)
    {
      $this->DeleteRegistrantResult = $DeleteRegistrantResult;
    }

    /**
     * @return Response
     */
    public function getDeleteRegistrantResult()
    {
      return $this->DeleteRegistrantResult;
    }

    /**
     * @param Response $DeleteRegistrantResult
     * @return \ascio\v2\DeleteRegistrantResponse
     */
    public function setDeleteRegistrantResult($DeleteRegistrantResult)
    {
      $this->DeleteRegistrantResult = $DeleteRegistrantResult;
      return $this;
    }

}
