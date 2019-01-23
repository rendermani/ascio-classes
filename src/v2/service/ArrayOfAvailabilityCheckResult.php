<?php

namespace ascio\v2;

class ArrayOfAvailabilityCheckResult
{

    /**
     * @var AvailabilityCheckResult[] $AvailabilityCheckResult
     */
    protected $AvailabilityCheckResult = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AvailabilityCheckResult[]
     */
    public function getAvailabilityCheckResult()
    {
      return $this->AvailabilityCheckResult;
    }

    /**
     * @param AvailabilityCheckResult[] $AvailabilityCheckResult
     * @return \ascio\v2\ArrayOfAvailabilityCheckResult
     */
    public function setAvailabilityCheckResult(array $AvailabilityCheckResult)
    {
      $this->AvailabilityCheckResult = $AvailabilityCheckResult;
      return $this;
    }

}
