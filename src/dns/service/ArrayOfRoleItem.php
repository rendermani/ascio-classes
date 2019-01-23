<?php

namespace ascio\dns;

class ArrayOfRoleItem
{

    /**
     * @var RoleItem[] $RoleItem
     */
    protected $RoleItem = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return RoleItem[]
     */
    public function getRoleItem()
    {
      return $this->RoleItem;
    }

    /**
     * @param RoleItem[] $RoleItem
     * @return \ascio\dns\ArrayOfRoleItem
     */
    public function setRoleItem(array $RoleItem)
    {
      $this->RoleItem = $RoleItem;
      return $this;
    }

}
