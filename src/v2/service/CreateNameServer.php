<?php

namespace ascio\v2;

class CreateNameServer
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var NameServer $nameServer
     */
    protected $nameServer = null;

    /**
     * @param string $sessionId
     * @param NameServer $nameServer
     */
    public function __construct($sessionId, $nameServer)
    {
      $this->sessionId = $sessionId;
      $this->nameServer = $nameServer;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
      return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return \ascio\v2\CreateNameServer
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
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
     * @return \ascio\v2\CreateNameServer
     */
    public function setNameServer($nameServer)
    {
      $this->nameServer = $nameServer;
      return $this;
    }

}
