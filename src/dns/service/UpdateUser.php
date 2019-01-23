<?php

namespace ascio\dns;

class UpdateUser
{

    /**
     * @var User $user
     */
    protected $user = null;

    /**
     * @param User $user
     */
    public function __construct($user)
    {
      $this->user = $user;
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
     * @return \ascio\dns\UpdateUser
     */
    public function setUser($user)
    {
      $this->user = $user;
      return $this;
    }

}
