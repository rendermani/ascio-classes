<?php

namespace ascio\dns;

class UpdateUserResponse
{

    /**
     * @var Response $UpdateUserResult
     */
    protected $UpdateUserResult = null;

    /**
     * @param Response $UpdateUserResult
     */
    public function __construct($UpdateUserResult)
    {
      $this->UpdateUserResult = $UpdateUserResult;
    }

    /**
     * @return Response
     */
    public function getUpdateUserResult()
    {
      return $this->UpdateUserResult;
    }

    /**
     * @param Response $UpdateUserResult
     * @return \ascio\dns\UpdateUserResponse
     */
    public function setUpdateUserResult($UpdateUserResult)
    {
      $this->UpdateUserResult = $UpdateUserResult;
      return $this;
    }

}
