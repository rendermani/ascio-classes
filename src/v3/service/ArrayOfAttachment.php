<?php

namespace ascio\v3;

class ArrayOfAttachment implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Attachment[] $Attachment
     */
    protected $Attachment = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Attachment[]
     */
    public function getAttachment()
    {
      return $this->Attachment;
    }

    /**
     * @param Attachment[] $Attachment
     * @return \ascio\v3\ArrayOfAttachment
     */
    public function setAttachment(array $Attachment = null)
    {
      $this->Attachment = $Attachment;
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
      return isset($this->Attachment[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Attachment
     */
    public function offsetGet($offset)
    {
      return $this->Attachment[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Attachment $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Attachment[] = $value;
      } else {
        $this->Attachment[$offset] = $value;
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
      unset($this->Attachment[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Attachment Return the current element
     */
    public function current()
    {
      return current($this->Attachment);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Attachment);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Attachment);
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
      reset($this->Attachment);
    }

    /**
     * Countable implementation
     *
     * @return Attachment Return count of elements
     */
    public function count()
    {
      return count($this->Attachment);
    }

}
