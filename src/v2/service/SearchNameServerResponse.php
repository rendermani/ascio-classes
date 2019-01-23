<?php

namespace ascio\v2;

class SearchNameServerResponse
{

    /**
     * @var Response $SearchNameServerResult
     */
    protected $SearchNameServerResult = null;

    /**
     * @var ArrayOfNameServer $nameServers
     */
    protected $nameServers = null;

    /**
     * @param Response $SearchNameServerResult
     * @param ArrayOfNameServer $nameServers
     */
    public function __construct($SearchNameServerResult, $nameServers)
    {
      $this->SearchNameServerResult = $SearchNameServerResult;
      $this->nameServers = $nameServers;
    }

    /**
     * @return Response
     */
    public function getSearchNameServerResult()
    {
      return $this->SearchNameServerResult;
    }

    /**
     * @param Response $SearchNameServerResult
     * @return \ascio\v2\SearchNameServerResponse
     */
    public function setSearchNameServerResult($SearchNameServerResult)
    {
      $this->SearchNameServerResult = $SearchNameServerResult;
      return $this;
    }

    /**
     * @return ArrayOfNameServer
     */
    public function getNameServers()
    {
      return $this->nameServers;
    }

    /**
     * @param ArrayOfNameServer $nameServers
     * @return \ascio\v2\SearchNameServerResponse
     */
    public function setNameServers($nameServers)
    {
      $this->nameServers = $nameServers;
      return $this;
    }

}
