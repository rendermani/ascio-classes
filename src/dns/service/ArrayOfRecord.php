<?php

namespace ascio\dns;

class ArrayOfRecord
{

    /**
     * @var Record[] $Record
     */
    protected $Record = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Record[]
     */
    public function getRecord()
    {
      return $this->Record;
    }

    /**
     * @param Record[] $Record
     * @return \ascio\dns\ArrayOfRecord
     */
    public function setRecord(array $Record)
    {
      $this->Record = $Record;
      return $this;
    }

}
