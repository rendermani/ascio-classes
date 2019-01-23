<?php

namespace ascio\v2;

class AvailabilityCheckResponse
{

    /**
     * @var Response $AvailabilityCheckResult
     */
    protected $AvailabilityCheckResult = null;

    /**
     * @var ArrayOfAvailabilityCheckResult $results
     */
    protected $results = null;

    /**
     * @param Response $AvailabilityCheckResult
     * @param ArrayOfAvailabilityCheckResult $results
     */
    public function __construct($AvailabilityCheckResult, $results)
    {
      $this->AvailabilityCheckResult = $AvailabilityCheckResult;
      $this->results = $results;
    }

    /**
     * @return Response
     */
    public function getAvailabilityCheckResult()
    {
      return $this->AvailabilityCheckResult;
    }

    /**
     * @param Response $AvailabilityCheckResult
     * @return \ascio\v2\AvailabilityCheckResponse
     */
    public function setAvailabilityCheckResult($AvailabilityCheckResult)
    {
      $this->AvailabilityCheckResult = $AvailabilityCheckResult;
      return $this;
    }

    /**
     * @return ArrayOfAvailabilityCheckResult
     */
    public function getResults()
    {
      return $this->results;
    }

    /**
     * @param ArrayOfAvailabilityCheckResult $results
     * @return \ascio\v2\AvailabilityCheckResponse
     */
    public function setResults($results)
    {
      $this->results = $results;
      return $this;
    }

}
