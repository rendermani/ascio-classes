<?php

namespace ascio\v2;

class LogIn
{

    /**
     * @var Session $session
     */
    protected $session = null;

    /**
     * @param Session $session
     */
    public function __construct($session)
    {
      $this->session = $session;
    }

    /**
     * @return Session
     */
    public function getSession()
    {
      return $this->session;
    }

    /**
     * @param Session $session
     * @return \ascio\v2\LogIn
     */
    public function setSession($session)
    {
      $this->session = $session;
      return $this;
    }

}
