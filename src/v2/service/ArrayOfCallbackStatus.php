<?php

namespace ascio\v2;

class ArrayOfCallbackStatus implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var CallbackStatus[] $CallbackStatus
     */
    protected $CallbackStatus = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return CallbackStatus[]
     */
    public function getCallbackStatus()
    {
      return $this->CallbackStatus;
    }

    /**
     * @param CallbackStatus[] $CallbackStatus
     * @return \ascio\v2\ArrayOfCallbackStatus
     */
    public function setCallbackStatus(array $CallbackStatus = null)
    {
      $this->CallbackStatus = $CallbackStatus;
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
      return isset($this->CallbackStatus[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return CallbackStatus
     */
    public function offsetGet($offset)
    {
      return $this->CallbackStatus[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param CallbackStatus $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->CallbackStatus[] = $value;
      } else {
        $this->CallbackStatus[$offset] = $value;
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
      unset($this->CallbackStatus[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return CallbackStatus Return the current element
     */
    public function current()
    {
      return current($this->CallbackStatus);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->CallbackStatus);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->CallbackStatus);
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
      reset($this->CallbackStatus);
    }

    /**
     * Countable implementation
     *
     * @return CallbackStatus Return count of elements
     */
    public function count()
    {
      return count($this->CallbackStatus);
    }

}
