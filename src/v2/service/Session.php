<?php

namespace ascio\v2;

class Session
{

    /**
     * @var string $Account
     */
    protected $Account = null;

    /**
     * @var string $Password
     */
    protected $Password = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAccount()
    {
      return $this->Account;
    }

    /**
     * @param string $Account
     * @return \ascio\v2\Session
     */
    public function setAccount($Account)
    {
      $this->Account = $Account;
      return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
      return $this->Password;
    }

    /**
     * @param string $Password
     * @return \ascio\v2\Session
     */
    public function setPassword($Password)
    {
      $this->Password = $Password;
      return $this;
    }

}
