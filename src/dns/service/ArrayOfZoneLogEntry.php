<?php

namespace ascio\dns;

class ArrayOfZoneLogEntry
{

    /**
     * @var ZoneLogEntry[] $ZoneLogEntry
     */
    protected $ZoneLogEntry = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ZoneLogEntry[]
     */
    public function getZoneLogEntry()
    {
      return $this->ZoneLogEntry;
    }

    /**
     * @param ZoneLogEntry[] $ZoneLogEntry
     * @return \ascio\dns\ArrayOfZoneLogEntry
     */
    public function setZoneLogEntry(array $ZoneLogEntry)
    {
      $this->ZoneLogEntry = $ZoneLogEntry;
      return $this;
    }

}
