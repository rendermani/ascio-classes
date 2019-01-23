<?php

namespace ascio\v2;

class GetRegistrantResponse
{

    /**
     * @var Response $GetRegistrantResult
     */
    protected $GetRegistrantResult = null;

    /**
     * @var Registrant $registrant
     */
    protected $registrant = null;

    /**
     * @param Response $GetRegistrantResult
     * @param Registrant $registrant
     */
    public function __construct($GetRegistrantResult, $registrant)
    {
      $this->GetRegistrantResult = $GetRegistrantResult;
      $this->registrant = $registrant;
    }

    /**
     * @return Response
     */
    public function getGetRegistrantResult()
    {
      return $this->GetRegistrantResult;
    }

    /**
     * @param Response $GetRegistrantResult
     * @return \ascio\v2\GetRegistrantResponse
     */
    public function setGetRegistrantResult($GetRegistrantResult)
    {
      $this->GetRegistrantResult = $GetRegistrantResult;
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
     * @return \ascio\v2\GetRegistrantResponse
     */
    public function setRegistrant($registrant)
    {
      $this->registrant = $registrant;
      return $this;
    }

}
