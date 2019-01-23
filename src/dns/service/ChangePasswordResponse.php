<?php

namespace ascio\dns;

class ChangePasswordResponse
{

    /**
     * @var Response $ChangePasswordResult
     */
    protected $ChangePasswordResult = null;

    /**
     * @param Response $ChangePasswordResult
     */
    public function __construct($ChangePasswordResult)
    {
      $this->ChangePasswordResult = $ChangePasswordResult;
    }

    /**
     * @return Response
     */
    public function getChangePasswordResult()
    {
      return $this->ChangePasswordResult;
    }

    /**
     * @param Response $ChangePasswordResult
     * @return \ascio\dns\ChangePasswordResponse
     */
    public function setChangePasswordResult($ChangePasswordResult)
    {
      $this->ChangePasswordResult = $ChangePasswordResult;
      return $this;
    }

}
