<?php

namespace ascio\dns;

class ChangePassword
{

    /**
     * @var string $userName
     */
    protected $userName = null;

    /**
     * @var string $newPassword
     */
    protected $newPassword = null;

    /**
     * @param string $userName
     * @param string $newPassword
     */
    public function __construct($userName, $newPassword)
    {
      $this->userName = $userName;
      $this->newPassword = $newPassword;
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
     * @return \ascio\dns\ChangePassword
     */
    public function setUserName($userName)
    {
      $this->userName = $userName;
      return $this;
    }

    /**
     * @return string
     */
    public function getNewPassword()
    {
      return $this->newPassword;
    }

    /**
     * @param string $newPassword
     * @return \ascio\dns\ChangePassword
     */
    public function setNewPassword($newPassword)
    {
      $this->newPassword = $newPassword;
      return $this;
    }

}
