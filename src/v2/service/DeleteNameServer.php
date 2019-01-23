<?php

namespace ascio\v2;

class DeleteNameServer
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $nameServerHandle
     */
    protected $nameServerHandle = null;

    /**
     * @param string $sessionId
     * @param string $nameServerHandle
     */
    public function __construct($sessionId, $nameServerHandle)
    {
      $this->sessionId = $sessionId;
      $this->nameServerHandle = $nameServerHandle;
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
     * @return \ascio\v2\DeleteNameServer
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getNameServerHandle()
    {
      return $this->nameServerHandle;
    }

    /**
     * @param string $nameServerHandle
     * @return \ascio\v2\DeleteNameServer
     */
    public function setNameServerHandle($nameServerHandle)
    {
      $this->nameServerHandle = $nameServerHandle;
      return $this;
    }

}
