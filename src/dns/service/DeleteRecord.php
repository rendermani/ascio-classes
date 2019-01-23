<?php

namespace ascio\dns;

class DeleteRecord
{

    /**
     * @var int $recordId
     */
    protected $recordId = null;

    /**
     * @param int $recordId
     */
    public function __construct($recordId)
    {
      $this->recordId = $recordId;
    }

    /**
     * @return int
     */
    public function getRecordId()
    {
      return $this->recordId;
    }

    /**
     * @param int $recordId
     * @return \ascio\dns\DeleteRecord
     */
    public function setRecordId($recordId)
    {
      $this->recordId = $recordId;
      return $this;
    }

}
