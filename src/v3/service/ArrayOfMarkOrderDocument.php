<?php

namespace ascio\v3;

class ArrayOfMarkOrderDocument implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var MarkOrderDocument[] $MarkOrderDocument
     */
    protected $MarkOrderDocument = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return MarkOrderDocument[]
     */
    public function getMarkOrderDocument()
    {
      return $this->MarkOrderDocument;
    }

    /**
     * @param MarkOrderDocument[] $MarkOrderDocument
     * @return \ascio\v3\ArrayOfMarkOrderDocument
     */
    public function setMarkOrderDocument(array $MarkOrderDocument = null)
    {
      $this->MarkOrderDocument = $MarkOrderDocument;
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
      return isset($this->MarkOrderDocument[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return MarkOrderDocument
     */
    public function offsetGet($offset)
    {
      return $this->MarkOrderDocument[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param MarkOrderDocument $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->MarkOrderDocument[] = $value;
      } else {
        $this->MarkOrderDocument[$offset] = $value;
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
      unset($this->MarkOrderDocument[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return MarkOrderDocument Return the current element
     */
    public function current()
    {
      return current($this->MarkOrderDocument);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->MarkOrderDocument);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->MarkOrderDocument);
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
      reset($this->MarkOrderDocument);
    }

    /**
     * Countable implementation
     *
     * @return MarkOrderDocument Return count of elements
     */
    public function count()
    {
      return count($this->MarkOrderDocument);
    }

}
