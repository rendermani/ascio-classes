<?php

namespace ascio\v2;

class GetNameServerResponse
{

    /**
     * @var Response $GetNameServerResult
     */
    protected $GetNameServerResult = null;

    /**
     * @var NameServer $nameServer
     */
    protected $nameServer = null;

    /**
     * @param Response $GetNameServerResult
     * @param NameServer $nameServer
     */
    public function __construct($GetNameServerResult, $nameServer)
    {
      $this->GetNameServerResult = $GetNameServerResult;
      $this->nameServer = $nameServer;
    }

    /**
     * @return Response
     */
    public function getGetNameServerResult()
    {
      return $this->GetNameServerResult;
    }

    /**
     * @param Response $GetNameServerResult
     * @return \ascio\v2\GetNameServerResponse
     */
    public function setGetNameServerResult($GetNameServerResult)
    {
      $this->GetNameServerResult = $GetNameServerResult;
      return $this;
    }

    /**
     * @return NameServer
     */
    public function getNameServer()
    {
      return $this->nameServer;
    }

    /**
     * @param NameServer $nameServer
     * @return \ascio\v2\GetNameServerResponse
     */
    public function setNameServer($nameServer)
    {
      $this->nameServer = $nameServer;
      return $this;
    }

}
