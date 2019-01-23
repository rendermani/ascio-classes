<?php

namespace ascio\dns;

class GetUser
{

    /**
     * @var string $userName
     */
    protected $userName = null;

    /**
     * @param string $userName
     */
    public function __construct($userName)
    {
      $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
      return $this->userName;
    }

    /**
     * @param string $userName
     * @return \ascio\dns\GetUser
     */
    public function setUserName($userName)
    {
      $this->userName = $userName;
      return $this;
    }

}
