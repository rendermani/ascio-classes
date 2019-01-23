<?php

namespace ascio\dns;

class CreateRecord
{

    /**
     * @var string $zoneName
     */
    protected $zoneName = null;

    /**
     * @var Record $record
     */
    protected $record = null;

    /**
     * @param string $zoneName
     * @param Record $record
     */
    public function __construct($zoneName, $record)
    {
      $this->zoneName = $zoneName;
      $this->record = $record;
    }

    /**
     * @return string
     */
    public function getZoneName()
    {
      return $this->zoneName;
    }

    /**
     * @param string $zoneName
     * @return \ascio\dns\CreateRecord
     */
    public function setZoneName($zoneName)
    {
      $this->zoneName = $zoneName;
      return $this;
    }

    /**
     * @return Record
     */
    public function getRecord()
    {
      return $this->record;
    }

    /**
     * @param Record $record
     * @return \ascio\dns\CreateRecord
     */
    public function setRecord($record)
    {
      $this->record = $record;
      return $this;
    }

}
