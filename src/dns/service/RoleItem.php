<?php

namespace ascio\dns;

class RoleItem
{

    /**
     * @var ArrayOfstring $Rights
     */
    protected $Rights = null;

    /**
     * @var string $Role
     */
    protected $Role = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfstring
     */
    public function getRights()
    {
      return $this->Rights;
    }

    /**
     * @param ArrayOfstring $Rights
     * @return \ascio\dns\RoleItem
     */
    public function setRights($Rights)
    {
      $this->Rights = $Rights;
      return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
      return $this->Role;
    }

    /**
     * @param string $Role
     * @return \ascio\dns\RoleItem
     */
    public function setRole($Role)
    {
      $this->Role = $Role;
      return $this;
    }

}
