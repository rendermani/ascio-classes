<?php

namespace ascio\v3;

class ArrayOfOrderStatusType implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var OrderStatusType[] $OrderStatusType
     */
    protected $OrderStatusType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return OrderStatusType[]
     */
    public function getOrderStatusType()
    {
      return $this->OrderStatusType;
    }

    /**
     * @param OrderStatusType[] $OrderStatusType
     * @return \ascio\v3\ArrayOfOrderStatusType
     */
    public function setOrderStatusType(array $OrderStatusType = null)
    {
      $this->OrderStatusType = $OrderStatusType;
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
      return isset($this->OrderStatusType[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return OrderStatusType
     */
    public function offsetGet($offset)
    {
      return $this->OrderStatusType[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param OrderStatusType $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->OrderStatusType[] = $value;
      } else {
        $this->OrderStatusType[$offset] = $value;
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
      unset($this->OrderStatusType[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return OrderStatusType Return the current element
     */
    public function current()
    {
      return current($this->OrderStatusType);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->OrderStatusType);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->OrderStatusType);
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
      reset($this->OrderStatusType);
    }

    /**
     * Countable implementation
     *
     * @return OrderStatusType Return count of elements
     */
    public function count()
    {
      return count($this->OrderStatusType);
    }

}
