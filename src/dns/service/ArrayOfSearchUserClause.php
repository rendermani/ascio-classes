<?php

namespace ascio\dns;

class ArrayOfSearchUserClause implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var SearchUserClause[] $SearchUserClause
     */
    protected $SearchUserClause = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return SearchUserClause[]
     */
    public function getSearchUserClause()
    {
      return $this->SearchUserClause;
    }

    /**
     * @param SearchUserClause[] $SearchUserClause
     * @return \ascio\dns\ArrayOfSearchUserClause
     */
    public function setSearchUserClause(array $SearchUserClause = null)
    {
      $this->SearchUserClause = $SearchUserClause;
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
      return isset($this->SearchUserClause[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return SearchUserClause
     */
    public function offsetGet($offset)
    {
      return $this->SearchUserClause[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param SearchUserClause $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->SearchUserClause[] = $value;
      } else {
        $this->SearchUserClause[$offset] = $value;
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
      unset($this->SearchUserClause[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return SearchUserClause Return the current element
     */
    public function current()
    {
      return current($this->SearchUserClause);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->SearchUserClause);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->SearchUserClause);
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
      reset($this->SearchUserClause);
    }

    /**
     * Countable implementation
     *
     * @return SearchUserClause Return count of elements
     */
    public function count()
    {
      return count($this->SearchUserClause);
    }

}
