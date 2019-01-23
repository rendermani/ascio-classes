<?php

namespace ascio\v2;

class CreateNameServerResponse
{

    /**
     * @var Response $CreateNameServerResult
     */
    protected $CreateNameServerResult = null;

    /**
     * @var NameServer $nameServer
     */
    protected $nameServer = null;

    /**
     * @param Response $CreateNameServerResult
     * @param NameServer $nameServer
     */
    public function __construct($CreateNameServerResult, $nameServer)
    {
      $this->CreateNameServerResult = $CreateNameServerResult;
      $this->nameServer = $nameServer;
    }

    /**
     * @return Response
     */
    public function getCreateNameServerResult()
    {
      return $this->CreateNameServerResult;
    }

    /**
     * @param Response $CreateNameServerResult
     * @return \ascio\v2\CreateNameServerResponse
     */
    public function setCreateNameServerResult($CreateNameServerResult)
    {
      $this->CreateNameServerResult = $CreateNameServerResult;
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
     * @return \ascio\v2\CreateNameServerResponse
     */
    public function setNameServer($nameServer)
    {
      $this->nameServer = $nameServer;
      return $this;
    }

}
