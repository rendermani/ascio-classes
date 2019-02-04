<?php

namespace ascio\dns;

class ArrayOfSearchZoneClause implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var SearchZoneClause[] $SearchZoneClause
     */
    protected $SearchZoneClause = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return SearchZoneClause[]
     */
    public function getSearchZoneClause()
    {
      return $this->SearchZoneClause;
    }

    /**
     * @param SearchZoneClause[] $SearchZoneClause
     * @return \ascio\dns\ArrayOfSearchZoneClause
     */
    public function setSearchZoneClause(array $SearchZoneClause = null)
    {
      $this->SearchZoneClause = $SearchZoneClause;
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
      return isset($this->SearchZoneClause[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return SearchZoneClause
     */
    public function offsetGet($offset)
    {
      return $this->SearchZoneClause[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param SearchZoneClause $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->SearchZoneClause[] = $value;
      } else {
        $this->SearchZoneClause[$offset] = $value;
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
      unset($this->SearchZoneClause[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return SearchZoneClause Return the current element
     */
    public function current()
    {
      return current($this->SearchZoneClause);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->SearchZoneClause);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->SearchZoneClause);
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
      reset($this->SearchZoneClause);
    }

    /**
     * Countable implementation
     *
     * @return SearchZoneClause Return count of elements
     */
    public function count()
    {
      return count($this->SearchZoneClause);
    }

}
