<?php

namespace ascio\v3;

class ArrayOfErrorCode implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ErrorCode[] $ErrorCode
     */
    protected $ErrorCode = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ErrorCode[]
     */
    public function getErrorCode()
    {
      return $this->ErrorCode;
    }

    /**
     * @param ErrorCode[] $ErrorCode
     * @return \ascio\v3\ArrayOfErrorCode
     */
    public function setErrorCode(array $ErrorCode = null)
    {
      $this->ErrorCode = $ErrorCode;
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
      return isset($this->ErrorCode[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ErrorCode
     */
    public function offsetGet($offset)
    {
      return $this->ErrorCode[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ErrorCode $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->ErrorCode[] = $value;
      } else {
        $this->ErrorCode[$offset] = $value;
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
      unset($this->ErrorCode[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ErrorCode Return the current element
     */
    public function current()
    {
      return current($this->ErrorCode);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->ErrorCode);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->ErrorCode);
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
      reset($this->ErrorCode);
    }

    /**
     * Countable implementation
     *
     * @return ErrorCode Return count of elements
     */
    public function count()
    {
      return count($this->ErrorCode);
    }

}
