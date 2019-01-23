<?php

namespace ascio\dns;

class DeleteZoneResponse
{

    /**
     * @var Response $DeleteZoneResult
     */
    protected $DeleteZoneResult = null;

    /**
     * @param Response $DeleteZoneResult
     */
    public function __construct($DeleteZoneResult)
    {
      $this->DeleteZoneResult = $DeleteZoneResult;
    }

    /**
     * @return Response
     */
    public function getDeleteZoneResult()
    {
      return $this->DeleteZoneResult;
    }

    /**
     * @param Response $DeleteZoneResult
     * @return \ascio\dns\DeleteZoneResponse
     */
    public function setDeleteZoneResult($DeleteZoneResult)
    {
      $this->DeleteZoneResult = $DeleteZoneResult;
      return $this;
    }

}
