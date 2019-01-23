<?php

namespace ascio\dns;

class CreateUserResponse
{

    /**
     * @var Response $CreateUserResult
     */
    protected $CreateUserResult = null;

    /**
     * @param Response $CreateUserResult
     */
    public function __construct($CreateUserResult)
    {
      $this->CreateUserResult = $CreateUserResult;
    }

    /**
     * @return Response
     */
    public function getCreateUserResult()
    {
      return $this->CreateUserResult;
    }

    /**
     * @param Response $CreateUserResult
     * @return \ascio\dns\CreateUserResponse
     */
    public function setCreateUserResult($CreateUserResult)
    {
      $this->CreateUserResult = $CreateUserResult;
      return $this;
    }

}
