<?php

namespace ascio\v2;

class ArrayOfOrderType implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var OrderType[] $OrderType
     */
    protected $OrderType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return OrderType[]
     */
    public function getOrderType()
    {
      return $this->OrderType;
    }

    /**
     * @param OrderType[] $OrderType
     * @return \ascio\v2\ArrayOfOrderType
     */
    public function setOrderType(array $OrderType = null)
    {
      $this->OrderType = $OrderType;
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
      return isset($this->OrderType[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return OrderType
     */
    public function offsetGet($offset)
    {
      return $this->OrderType[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param OrderType $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->OrderType[] = $value;
      } else {
        $this->OrderType[$offset] = $value;
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
      unset($this->OrderType[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return OrderType Return the current element
     */
    public function current()
    {
      return current($this->OrderType);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->OrderType);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->OrderType);
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
      reset($this->OrderType);
    }

    /**
     * Countable implementation
     *
     * @return OrderType Return count of elements
     */
    public function count()
    {
      return count($this->OrderType);
    }

}
