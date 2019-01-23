<?php

namespace ascio\dns;

class SearchUserResponse
{

    /**
     * @var Response $SearchUserResult
     */
    protected $SearchUserResult = null;

    /**
     * @var ArrayOfstring $userNames
     */
    protected $userNames = null;

    /**
     * @param Response $SearchUserResult
     * @param ArrayOfstring $userNames
     */
    public function __construct($SearchUserResult, $userNames)
    {
      $this->SearchUserResult = $SearchUserResult;
      $this->userNames = $userNames;
    }

    /**
     * @return Response
     */
    public function getSearchUserResult()
    {
      return $this->SearchUserResult;
    }

    /**
     * @param Response $SearchUserResult
     * @return \ascio\dns\SearchUserResponse
     */
    public function setSearchUserResult($SearchUserResult)
    {
      $this->SearchUserResult = $SearchUserResult;
      return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getUserNames()
    {
      return $this->userNames;
    }

    /**
     * @param ArrayOfstring $userNames
     * @return \ascio\dns\SearchUserResponse
     */
    public function setUserNames($userNames)
    {
      $this->userNames = $userNames;
      return $this;
    }

}
