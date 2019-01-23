<?php

namespace ascio\v2;

class CreateRegistrantResponse
{

    /**
     * @var Response $CreateRegistrantResult
     */
    protected $CreateRegistrantResult = null;

    /**
     * @var Registrant $registrant
     */
    protected $registrant = null;

    /**
     * @param Response $CreateRegistrantResult
     * @param Registrant $registrant
     */
    public function __construct($CreateRegistrantResult, $registrant)
    {
      $this->CreateRegistrantResult = $CreateRegistrantResult;
      $this->registrant = $registrant;
    }

    /**
     * @return Response
     */
    public function getCreateRegistrantResult()
    {
      return $this->CreateRegistrantResult;
    }

    /**
     * @param Response $CreateRegistrantResult
     * @return \ascio\v2\CreateRegistrantResponse
     */
    public function setCreateRegistrantResult($CreateRegistrantResult)
    {
      $this->CreateRegistrantResult = $CreateRegistrantResult;
      return $this;
    }

    /**
     * @return Registrant
     */
    public function getRegistrant()
    {
      return $this->registrant;
    }

    /**
     * @param Registrant $registrant
     * @return \ascio\v2\CreateRegistrantResponse
     */
    public function setRegistrant($registrant)
    {
      $this->registrant = $registrant;
      return $this;
    }

}
