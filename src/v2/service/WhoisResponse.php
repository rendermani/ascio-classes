<?php

namespace ascio\v2;

class WhoisResponse
{

    /**
     * @var Response $WhoisResult
     */
    protected $WhoisResult = null;

    /**
     * @var string $whoisData
     */
    protected $whoisData = null;

    /**
     * @param Response $WhoisResult
     * @param string $whoisData
     */
    public function __construct($WhoisResult, $whoisData)
    {
      $this->WhoisResult = $WhoisResult;
      $this->whoisData = $whoisData;
    }

    /**
     * @return Response
     */
    public function getWhoisResult()
    {
      return $this->WhoisResult;
    }

    /**
     * @param Response $WhoisResult
     * @return \ascio\v2\WhoisResponse
     */
    public function setWhoisResult($WhoisResult)
    {
      $this->WhoisResult = $WhoisResult;
      return $this;
    }

    /**
     * @return string
     */
    public function getWhoisData()
    {
      return $this->whoisData;
    }

    /**
     * @param string $whoisData
     * @return \ascio\v2\WhoisResponse
     */
    public function setWhoisData($whoisData)
    {
      $this->whoisData = $whoisData;
      return $this;
    }

}
