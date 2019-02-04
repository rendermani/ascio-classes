<?php

namespace ascio\v2;

class ArrayOfRegistrant implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Registrant[] $Registrant
     */
    protected $Registrant = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Registrant[]
     */
    public function getRegistrant()
    {
      return $this->Registrant;
    }

    /**
     * @param Registrant[] $Registrant
     * @return \ascio\v2\ArrayOfRegistrant
     */
    public function setRegistrant(array $Registrant = null)
    {
      $this->Registrant = $Registrant;
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
      return isset($this->Registrant[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Registrant
     */
    public function offsetGet($offset)
    {
      return $this->Registrant[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Registrant $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Registrant[] = $value;
      } else {
        $this->Registrant[$offset] = $value;
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
      unset($this->Registrant[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Registrant Return the current element
     */
    public function current()
    {
      return current($this->Registrant);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Registrant);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Registrant);
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
      reset($this->Registrant);
    }

    /**
     * Countable implementation
     *
     * @return Registrant Return count of elements
     */
    public function count()
    {
      return count($this->Registrant);
    }

}
