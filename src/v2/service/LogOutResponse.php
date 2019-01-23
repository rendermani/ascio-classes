<?php

namespace ascio\v2;

class LogOutResponse
{

    /**
     * @var Response $LogOutResult
     */
    protected $LogOutResult = null;

    /**
     * @param Response $LogOutResult
     */
    public function __construct($LogOutResult)
    {
      $this->LogOutResult = $LogOutResult;
    }

    /**
     * @return Response
     */
    public function getLogOutResult()
    {
      return $this->LogOutResult;
    }

    /**
     * @param Response $LogOutResult
     * @return \ascio\v2\LogOutResponse
     */
    public function setLogOutResult($LogOutResult)
    {
      $this->LogOutResult = $LogOutResult;
      return $this;
    }

}
