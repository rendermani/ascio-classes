<?php

namespace ascio\v2;

class GetDomainResponse
{

    /**
     * @var Response $GetDomainResult
     */
    protected $GetDomainResult = null;

    /**
     * @var Domain $domain
     */
    protected $domain = null;

    /**
     * @param Response $GetDomainResult
     * @param Domain $domain
     */
    public function __construct($GetDomainResult, $domain)
    {
      $this->GetDomainResult = $GetDomainResult;
      $this->domain = $domain;
    }

    /**
     * @return Response
     */
    public function getGetDomainResult()
    {
      return $this->GetDomainResult;
    }

    /**
     * @param Response $GetDomainResult
     * @return \ascio\v2\GetDomainResponse
     */
    public function setGetDomainResult($GetDomainResult)
    {
      $this->GetDomainResult = $GetDomainResult;
      return $this;
    }

    /**
     * @return Domain
     */
    public function getDomain()
    {
      return $this->domain;
    }

    /**
     * @param Domain $domain
     * @return \ascio\v2\GetDomainResponse
     */
    public function setDomain($domain)
    {
      $this->domain = $domain;
      return $this;
    }

}
