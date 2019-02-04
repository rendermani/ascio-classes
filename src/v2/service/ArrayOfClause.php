<?php

namespace ascio\v2;

class ArrayOfClause implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Clause[] $Clause
     */
    protected $Clause = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Clause[]
     */
    public function getClause()
    {
      return $this->Clause;
    }

    /**
     * @param Clause[] $Clause
     * @return \ascio\v2\ArrayOfClause
     */
    public function setClause(array $Clause = null)
    {
      $this->Clause = $Clause;
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
      return isset($this->Clause[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Clause
     */
    public function offsetGet($offset)
    {
      return $this->Clause[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Clause $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Clause[] = $value;
      } else {
        $this->Clause[$offset] = $value;
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
      unset($this->Clause[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Clause Return the current element
     */
    public function current()
    {
      return current($this->Clause);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Clause);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Clause);
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
      reset($this->Clause);
    }

    /**
     * Countable implementation
     *
     * @return Clause Return count of elements
     */
    public function count()
    {
      return count($this->Clause);
    }

}
