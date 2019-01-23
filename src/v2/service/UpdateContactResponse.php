<?php

namespace ascio\v2;

class UpdateContactResponse
{

    /**
     * @var Response $UpdateContactResult
     */
    protected $UpdateContactResult = null;

    /**
     * @param Response $UpdateContactResult
     */
    public function __construct($UpdateContactResult)
    {
      $this->UpdateContactResult = $UpdateContactResult;
    }

    /**
     * @return Response
     */
    public function getUpdateContactResult()
    {
      return $this->UpdateContactResult;
    }

    /**
     * @param Response $UpdateContactResult
     * @return \ascio\v2\UpdateContactResponse
     */
    public function setUpdateContactResult($UpdateContactResult)
    {
      $this->UpdateContactResult = $UpdateContactResult;
      return $this;
    }

}
