<?php

namespace ascio\dns;

class ArrayOfZoneLogEntry implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var ZoneLogEntry[] $ZoneLogEntry
     */
    protected $ZoneLogEntry = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ZoneLogEntry[]
     */
    public function getZoneLogEntry()
    {
      return $this->ZoneLogEntry;
    }

    /**
     * @param ZoneLogEntry[] $ZoneLogEntry
     * @return \ascio\dns\ArrayOfZoneLogEntry
     */
    public function setZoneLogEntry(array $ZoneLogEntry = null)
    {
      $this->ZoneLogEntry = $ZoneLogEntry;
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
      return isset($this->ZoneLogEntry[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ZoneLogEntry
     */
    public function offsetGet($offset)
    {
      return $this->ZoneLogEntry[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ZoneLogEntry $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->ZoneLogEntry[] = $value;
      } else {
        $this->ZoneLogEntry[$offset] = $value;
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
      unset($this->ZoneLogEntry[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ZoneLogEntry Return the current element
     */
    public function current()
    {
      return current($this->ZoneLogEntry);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->ZoneLogEntry);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->ZoneLogEntry);
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
      reset($this->ZoneLogEntry);
    }

    /**
     * Countable implementation
     *
     * @return ZoneLogEntry Return count of elements
     */
    public function count()
    {
      return count($this->ZoneLogEntry);
    }

}
