<?php

namespace ascio\dns;

class DeleteUserResponse
{

    /**
     * @var Response $DeleteUserResult
     */
    protected $DeleteUserResult = null;

    /**
     * @param Response $DeleteUserResult
     */
    public function __construct($DeleteUserResult)
    {
      $this->DeleteUserResult = $DeleteUserResult;
    }

    /**
     * @return Response
     */
    public function getDeleteUserResult()
    {
      return $this->DeleteUserResult;
    }

    /**
     * @param Response $DeleteUserResult
     * @return \ascio\dns\DeleteUserResponse
     */
    public function setDeleteUserResult($DeleteUserResult)
    {
      $this->DeleteUserResult = $DeleteUserResult;
      return $this;
    }

}
