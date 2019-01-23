<?php

namespace ascio\dns;

class GetRolesResponse
{

    /**
     * @var Response $GetRolesResult
     */
    protected $GetRolesResult = null;

    /**
     * @var ArrayOfRoleItem $roles
     */
    protected $roles = null;

    /**
     * @param Response $GetRolesResult
     * @param ArrayOfRoleItem $roles
     */
    public function __construct($GetRolesResult, $roles)
    {
      $this->GetRolesResult = $GetRolesResult;
      $this->roles = $roles;
    }

    /**
     * @return Response
     */
    public function getGetRolesResult()
    {
      return $this->GetRolesResult;
    }

    /**
     * @param Response $GetRolesResult
     * @return \ascio\dns\GetRolesResponse
     */
    public function setGetRolesResult($GetRolesResult)
    {
      $this->GetRolesResult = $GetRolesResult;
      return $this;
    }

    /**
     * @return ArrayOfRoleItem
     */
    public function getRoles()
    {
      return $this->roles;
    }

    /**
     * @param ArrayOfRoleItem $roles
     * @return \ascio\dns\GetRolesResponse
     */
    public function setRoles($roles)
    {
      $this->roles = $roles;
      return $this;
    }

}
