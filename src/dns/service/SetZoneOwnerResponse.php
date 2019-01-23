<?php

namespace ascio\dns;

class SetZoneOwnerResponse
{

    /**
     * @var Response $SetZoneOwnerResult
     */
    protected $SetZoneOwnerResult = null;

    /**
     * @param Response $SetZoneOwnerResult
     */
    public function __construct($SetZoneOwnerResult)
    {
      $this->SetZoneOwnerResult = $SetZoneOwnerResult;
    }

    /**
     * @return Response
     */
    public function getSetZoneOwnerResult()
    {
      return $this->SetZoneOwnerResult;
    }

    /**
     * @param Response $SetZoneOwnerResult
     * @return \ascio\dns\SetZoneOwnerResponse
     */
    public function setSetZoneOwnerResult($SetZoneOwnerResult)
    {
      $this->SetZoneOwnerResult = $SetZoneOwnerResult;
      return $this;
    }

}
