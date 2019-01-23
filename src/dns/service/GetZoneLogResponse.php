<?php

namespace ascio\dns;

class GetZoneLogResponse
{

    /**
     * @var Response $GetZoneLogResult
     */
    protected $GetZoneLogResult = null;

    /**
     * @var ArrayOfZoneLogEntry $zoneLogEntries
     */
    protected $zoneLogEntries = null;

    /**
     * @param Response $GetZoneLogResult
     * @param ArrayOfZoneLogEntry $zoneLogEntries
     */
    public function __construct($GetZoneLogResult, $zoneLogEntries)
    {
      $this->GetZoneLogResult = $GetZoneLogResult;
      $this->zoneLogEntries = $zoneLogEntries;
    }

    /**
     * @return Response
     */
    public function getGetZoneLogResult()
    {
      return $this->GetZoneLogResult;
    }

    /**
     * @param Response $GetZoneLogResult
     * @return \ascio\dns\GetZoneLogResponse
     */
    public function setGetZoneLogResult($GetZoneLogResult)
    {
      $this->GetZoneLogResult = $GetZoneLogResult;
      return $this;
    }

    /**
     * @return ArrayOfZoneLogEntry
     */
    public function getZoneLogEntries()
    {
      return $this->zoneLogEntries;
    }

    /**
     * @param ArrayOfZoneLogEntry $zoneLogEntries
     * @return \ascio\dns\GetZoneLogResponse
     */
    public function setZoneLogEntries($zoneLogEntries)
    {
      $this->zoneLogEntries = $zoneLogEntries;
      return $this;
    }

}
