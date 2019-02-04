<?php

namespace ascio\dns;

class ArrayOfRecord implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Record[] $Record
     */
    protected $Record = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Record[]
     */
    public function getRecord()
    {
      return $this->Record;
    }

    /**
     * @param Record[] $Record
     * @return \ascio\dns\ArrayOfRecord
     */
    public function setRecord(array $Record = null)
    {
      $this->Record = $Record;
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
      return isset($this->Record[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Record
     */
    public function offsetGet($offset)
    {
      return $this->Record[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Record $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Record[] = $value;
      } else {
        $this->Record[$offset] = $value;
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
      unset($this->Record[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Record Return the current element
     */
    public function current()
    {
      return current($this->Record);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Record);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Record);
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
      reset($this->Record);
    }

    /**
     * Countable implementation
     *
     * @return Record Return count of elements
     */
    public function count()
    {
      return count($this->Record);
    }

}
