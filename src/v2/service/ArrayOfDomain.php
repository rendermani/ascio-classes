<?php

namespace ascio\v2;

class ArrayOfDomain implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Domain[] $Domain
     */
    protected $Domain = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Domain[]
     */
    public function getDomain()
    {
      return $this->Domain;
    }

    /**
     * @param Domain[] $Domain
     * @return \ascio\v2\ArrayOfDomain
     */
    public function setDomain(array $Domain = null)
    {
      $this->Domain = $Domain;
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
      return isset($this->Domain[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Domain
     */
    public function offsetGet($offset)
    {
      return $this->Domain[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Domain $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Domain[] = $value;
      } else {
        $this->Domain[$offset] = $value;
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
      unset($this->Domain[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Domain Return the current element
     */
    public function current()
    {
      return current($this->Domain);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Domain);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Domain);
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
      reset($this->Domain);
    }

    /**
     * Countable implementation
     *
     * @return Domain Return count of elements
     */
    public function count()
    {
      return count($this->Domain);
    }

}
