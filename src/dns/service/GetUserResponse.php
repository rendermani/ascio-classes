<?php

namespace ascio\dns;

class GetUserResponse
{

    /**
     * @var Response $GetUserResult
     */
    protected $GetUserResult = null;

    /**
     * @var User $user
     */
    protected $user = null;

    /**
     * @param Response $GetUserResult
     * @param User $user
     */
    public function __construct($GetUserResult, $user)
    {
      $this->GetUserResult = $GetUserResult;
      $this->user = $user;
    }

    /**
     * @return Response
     */
    public function getGetUserResult()
    {
      return $this->GetUserResult;
    }

    /**
     * @param Response $GetUserResult
     * @return \ascio\dns\GetUserResponse
     */
    public function setGetUserResult($GetUserResult)
    {
      $this->GetUserResult = $GetUserResult;
      return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
      return $this->user;
    }

    /**
     * @param User $user
     * @return \ascio\dns\GetUserResponse
     */
    public function setUser($user)
    {
      $this->user = $user;
      return $this;
    }

}
