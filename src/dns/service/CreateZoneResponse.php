<?php

namespace ascio\dns;

class CreateZoneResponse
{

    /**
     * @var Response $CreateZoneResult
     */
    protected $CreateZoneResult = null;

    /**
     * @param Response $CreateZoneResult
     */
    public function __construct($CreateZoneResult)
    {
      $this->CreateZoneResult = $CreateZoneResult;
    }

    /**
     * @return Response
     */
    public function getCreateZoneResult()
    {
      return $this->CreateZoneResult;
    }

    /**
     * @param Response $CreateZoneResult
     * @return \ascio\dns\CreateZoneResponse
     */
    public function setCreateZoneResult($CreateZoneResult)
    {
      $this->CreateZoneResult = $CreateZoneResult;
      return $this;
    }

}
