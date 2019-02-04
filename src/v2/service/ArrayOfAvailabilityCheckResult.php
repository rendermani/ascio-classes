<?php

namespace ascio\v2;

class ArrayOfAvailabilityCheckResult implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var AvailabilityCheckResult[] $AvailabilityCheckResult
     */
    protected $AvailabilityCheckResult = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AvailabilityCheckResult[]
     */
    public function getAvailabilityCheckResult()
    {
      return $this->AvailabilityCheckResult;
    }

    /**
     * @param AvailabilityCheckResult[] $AvailabilityCheckResult
     * @return \ascio\v2\ArrayOfAvailabilityCheckResult
     */
    public function setAvailabilityCheckResult(array $AvailabilityCheckResult = null)
    {
      $this->AvailabilityCheckResult = $AvailabilityCheckResult;
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
      return isset($this->AvailabilityCheckResult[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return AvailabilityCheckResult
     */
    public function offsetGet($offset)
    {
      return $this->AvailabilityCheckResult[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param AvailabilityCheckResult $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->AvailabilityCheckResult[] = $value;
      } else {
        $this->AvailabilityCheckResult[$offset] = $value;
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
      unset($this->AvailabilityCheckResult[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return AvailabilityCheckResult Return the current element
     */
    public function current()
    {
      return current($this->AvailabilityCheckResult);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->AvailabilityCheckResult);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->AvailabilityCheckResult);
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
      reset($this->AvailabilityCheckResult);
    }

    /**
     * Countable implementation
     *
     * @return AvailabilityCheckResult Return count of elements
     */
    public function count()
    {
      return count($this->AvailabilityCheckResult);
    }

}
