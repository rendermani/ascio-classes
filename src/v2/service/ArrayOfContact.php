<?php

namespace ascio\v2;

class ArrayOfContact implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var Contact[] $Contact
     */
    protected $Contact = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Contact[]
     */
    public function getContact()
    {
      return $this->Contact;
    }

    /**
     * @param Contact[] $Contact
     * @return \ascio\v2\ArrayOfContact
     */
    public function setContact(array $Contact = null)
    {
      $this->Contact = $Contact;
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
      return isset($this->Contact[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return Contact
     */
    public function offsetGet($offset)
    {
      return $this->Contact[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param Contact $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->Contact[] = $value;
      } else {
        $this->Contact[$offset] = $value;
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
      unset($this->Contact[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return Contact Return the current element
     */
    public function current()
    {
      return current($this->Contact);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->Contact);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->Contact);
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
      reset($this->Contact);
    }

    /**
     * Countable implementation
     *
     * @return Contact Return count of elements
     */
    public function count()
    {
      return count($this->Contact);
    }

}
