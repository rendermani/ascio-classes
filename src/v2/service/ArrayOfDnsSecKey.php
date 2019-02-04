<?php

namespace ascio\v2;

class ArrayOfDnsSecKey implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var DnsSecKey[] $DnsSecKey
     */
    protected $DnsSecKey = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DnsSecKey[]
     */
    public function getDnsSecKey()
    {
      return $this->DnsSecKey;
    }

    /**
     * @param DnsSecKey[] $DnsSecKey
     * @return \ascio\v2\ArrayOfDnsSecKey
     */
    public function setDnsSecKey(array $DnsSecKey = null)
    {
      $this->DnsSecKey = $DnsSecKey;
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
      return isset($this->DnsSecKey[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return DnsSecKey
     */
    public function offsetGet($offset)
    {
      return $this->DnsSecKey[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param DnsSecKey $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->DnsSecKey[] = $value;
      } else {
        $this->DnsSecKey[$offset] = $value;
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
      unset($this->DnsSecKey[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return DnsSecKey Return the current element
     */
    public function current()
    {
      return current($this->DnsSecKey);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->DnsSecKey);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->DnsSecKey);
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
      reset($this->DnsSecKey);
    }

    /**
     * Countable implementation
     *
     * @return DnsSecKey Return count of elements
     */
    public function count()
    {
      return count($this->DnsSecKey);
    }

}
