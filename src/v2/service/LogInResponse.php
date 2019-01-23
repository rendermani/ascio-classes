<?php

namespace ascio\v2;

class LogInResponse
{

    /**
     * @var Response $LogInResult
     */
    protected $LogInResult = null;

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @param Response $LogInResult
     * @param string $sessionId
     */
    public function __construct($LogInResult, $sessionId)
    {
      $this->LogInResult = $LogInResult;
      $this->sessionId = $sessionId;
    }

    /**
     * @return Response
     */
    public function getLogInResult()
    {
      return $this->LogInResult;
    }

    /**
     * @param Response $LogInResult
     * @return \ascio\v2\LogInResponse
     */
    public function setLogInResult($LogInResult)
    {
      $this->LogInResult = $LogInResult;
      return $this;
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
     * @return \ascio\v2\LogInResponse
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

}
