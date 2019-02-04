<?php

namespace ascio\v3;

class ArrayOfObjectType implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ObjectType[] $ObjectType
     */
    protected $ObjectType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ObjectType[]
     */
    public function getObjectType()
    {
      return $this->ObjectType;
    }

    /**
     * @param ObjectType[] $ObjectType
     * @return \ascio\v3\ArrayOfObjectType
     */
    public function setObjectType(array $ObjectType = null)
    {
      $this->ObjectType = $ObjectType;
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
      return isset($this->ObjectType[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ObjectType
     */
    public function offsetGet($offset)
    {
      return $this->ObjectType[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ObjectType $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->ObjectType[] = $value;
      } else {
        $this->ObjectType[$offset] = $value;
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
      unset($this->ObjectType[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ObjectType Return the current element
     */
    public function current()
    {
      return current($this->ObjectType);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->ObjectType);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->ObjectType);
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
      reset($this->ObjectType);
    }

    /**
     * Countable implementation
     *
     * @return ObjectType Return count of elements
     */
    public function count()
    {
      return count($this->ObjectType);
    }

}
