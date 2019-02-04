<?php

namespace ascio\v3;

class ArrayOfMessage implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Message[] $Message
     */
    protected $Message = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Message[]
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param Message[] $Message
     * @return \ascio\v3\ArrayOfMessage
     */
    public function setMessage(array $Message = null)
    {
      $this->Message = $Message;
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
      return isset($this->Message[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Message
     */
    public function offsetGet($offset)
    {
      return $this->Message[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Message $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Message[] = $value;
      } else {
        $this->Message[$offset] = $value;
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
      unset($this->Message[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Message Return the current element
     */
    public function current()
    {
      return current($this->Message);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Message);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Message);
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
      reset($this->Message);
    }

    /**
     * Countable implementation
     *
     * @return Message Return count of elements
     */
    public function count()
    {
      return count($this->Message);
    }

}
