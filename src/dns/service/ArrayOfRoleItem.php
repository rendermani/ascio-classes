<?php

namespace ascio\dns;

class ArrayOfRoleItem implements \ArrayAccess, \Iterator, \Countable
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
    public function setRoleItem(array $RoleItem = null)
    {
      $this->RoleItem = $RoleItem;
      return $this;
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset An offset to check for
     * @return boolean true on success or false on failure
     */
    public function offsetExists($offset)
    {
      return isset($this->RoleItem[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return RoleItem
     */
    public function offsetGet($offset)
    {
      return $this->RoleItem[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param RoleItem $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->RoleItem[] = $value;
      } else {
        $this->RoleItem[$offset] = $value;
      }
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to unset
     * @return void
     */
    public function offsetUnset($offset)
    {
      unset($this->RoleItem[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return RoleItem Return the current element
     */
    public function current()
    {
      return current($this->RoleItem);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->RoleItem);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->RoleItem);
    }

    /**
     * Iterator implementation
     *
     * @return boolean Return the validity of the current position
     */
    public function valid()
    {
      return $this->key() !== null;
    }

    /**
     * Iterator implementation
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
      reset($this->RoleItem);
    }

    /**
     * Countable implementation
     *
     * @return RoleItem Return count of elements
     */
    public function count()
    {
      return count($this->RoleItem);
    }

}
