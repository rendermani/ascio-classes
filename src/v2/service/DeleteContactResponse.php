<?php

namespace ascio\v2;

class DeleteContactResponse
{

    /**
     * @var Response $DeleteContactResult
     */
    protected $DeleteContactResult = null;

    /**
     * @param Response $DeleteContactResult
     */
    public function __construct($DeleteContactResult)
    {
      $this->DeleteContactResult = $DeleteContactResult;
    }

    /**
     * @return Response
     */
    public function getDeleteContactResult()
    {
      return $this->DeleteContactResult;
    }

    /**
     * @param Response $DeleteContactResult
     * @return \ascio\v2\DeleteContactResponse
     */
    public function setDeleteContactResult($DeleteContactResult)
    {
      $this->DeleteContactResult = $DeleteContactResult;
      return $this;
    }

}
