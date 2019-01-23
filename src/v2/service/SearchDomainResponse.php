<?php

namespace ascio\v2;

class SearchDomainResponse
{

    /**
     * @var Response $SearchDomainResult
     */
    protected $SearchDomainResult = null;

    /**
     * @var ArrayOfDomain $domains
     */
    protected $domains = null;

    /**
     * @param Response $SearchDomainResult
     * @param ArrayOfDomain $domains
     */
    public function __construct($SearchDomainResult, $domains)
    {
      $this->SearchDomainResult = $SearchDomainResult;
      $this->domains = $domains;
    }

    /**
     * @return Response
     */
    public function getSearchDomainResult()
    {
      return $this->SearchDomainResult;
    }

    /**
     * @param Response $SearchDomainResult
     * @return \ascio\v2\SearchDomainResponse
     */
    public function setSearchDomainResult($SearchDomainResult)
    {
      $this->SearchDomainResult = $SearchDomainResult;
      return $this;
    }

    /**
     * @return ArrayOfDomain
     */
    public function getDomains()
    {
      return $this->domains;
    }

    /**
     * @param ArrayOfDomain $domains
     * @return \ascio\v2\SearchDomainResponse
     */
    public function setDomains($domains)
    {
      $this->domains = $domains;
      return $this;
    }

}
