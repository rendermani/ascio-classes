<?php

namespace ascio\v2;

class SearchDnsSecKey
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var SearchCriteria $criteria
     */
    protected $criteria = null;

    /**
     * @param string $sessionId
     * @param SearchCriteria $criteria
     */
    public function __construct($sessionId, $criteria)
    {
      $this->sessionId = $sessionId;
      $this->criteria = $criteria;
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
     * @return \ascio\v2\SearchDnsSecKey
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return SearchCriteria
     */
    public function getCriteria()
    {
      return $this->criteria;
    }

    /**
     * @param SearchCriteria $criteria
     * @return \ascio\v2\SearchDnsSecKey
     */
    public function setCriteria($criteria)
    {
      $this->criteria = $criteria;
      return $this;
    }

}
