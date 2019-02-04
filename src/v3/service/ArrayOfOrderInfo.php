<?php

namespace ascio\v3;

class ArrayOfOrderInfo implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var OrderInfo[] $OrderInfo
     */
    protected $OrderInfo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return OrderInfo[]
     */
    public function getOrderInfo()
    {
      return $this->OrderInfo;
    }

    /**
     * @param OrderInfo[] $OrderInfo
     * @return \ascio\v3\ArrayOfOrderInfo
     */
    public function setOrderInfo(array $OrderInfo = null)
    {
      $this->OrderInfo = $OrderInfo;
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
      return isset($this->OrderInfo[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return OrderInfo
     */
    public function offsetGet($offset)
    {
      return $this->OrderInfo[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param OrderInfo $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->OrderInfo[] = $value;
      } else {
        $this->OrderInfo[$offset] = $value;
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
      unset($this->OrderInfo[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return OrderInfo Return the current element
     */
    public function current()
    {
      return current($this->OrderInfo);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->OrderInfo);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->OrderInfo);
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
      reset($this->OrderInfo);
    }

    /**
     * Countable implementation
     *
     * @return OrderInfo Return count of elements
     */
    public function count()
    {
      return count($this->OrderInfo);
    }

}
