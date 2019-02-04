<?php

namespace ascio\v2;

class ArrayOfNameServer implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var NameServer[] $NameServer
     */
    protected $NameServer = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return NameServer[]
     */
    public function getNameServer()
    {
      return $this->NameServer;
    }

    /**
     * @param NameServer[] $NameServer
     * @return \ascio\v2\ArrayOfNameServer
     */
    public function setNameServer(array $NameServer = null)
    {
      $this->NameServer = $NameServer;
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
      return isset($this->NameServer[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return NameServer
     */
    public function offsetGet($offset)
    {
      return $this->NameServer[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param NameServer $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->NameServer[] = $value;
      } else {
        $this->NameServer[$offset] = $value;
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
      unset($this->NameServer[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return NameServer Return the current element
     */
    public function current()
    {
      return current($this->NameServer);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->NameServer);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->NameServer);
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
      reset($this->NameServer);
    }

    /**
     * Countable implementation
     *
     * @return NameServer Return count of elements
     */
    public function count()
    {
      return count($this->NameServer);
    }

}
