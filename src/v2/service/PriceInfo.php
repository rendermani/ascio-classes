<?php

namespace ascio\v2;

class PriceInfo
{

    /**
     * @var string $DomainName
     */
    protected $DomainName = null;

    /**
     * @var string $DomainType
     */
    protected $DomainType = null;

    /**
     * @var string $Currency
     */
    protected $Currency = null;

    /**
     * @var ArrayOfPrices $Prices
     */
    protected $Prices = null;

    /**
     * @var string $RenewalType
     */
    protected $RenewalType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getDomainName()
    {
      return $this->DomainName;
    }

    /**
     * @param string $DomainName
     * @return \ascio\v2\PriceInfo
     */
    public function setDomainName($DomainName)
    {
      $this->DomainName = $DomainName;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomainType()
    {
      return $this->DomainType;
    }

    /**
     * @param string $DomainType
     * @return \ascio\v2\PriceInfo
     */
    public function setDomainType($DomainType)
    {
      $this->DomainType = $DomainType;
      return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
      return $this->Currency;
    }

    /**
     * @param string $Currency
     * @return \ascio\v2\PriceInfo
     */
    public function setCurrency($Currency)
    {
      $this->Currency = $Currency;
      return $this;
    }

    /**
     * @return ArrayOfPrices
     */
    public function getPrices()
    {
      return $this->Prices;
    }

    /**
     * @param ArrayOfPrices $Prices
     * @return \ascio\v2\PriceInfo
     */
    public function setPrices($Prices)
    {
      $this->Prices = $Prices;
      return $this;
    }

    /**
     * @return string
     */
    public function getRenewalType()
    {
      return $this->RenewalType;
    }

    /**
     * @param string $RenewalType
     * @return \ascio\v2\PriceInfo
     */
    public function setRenewalType($RenewalType)
    {
      $this->RenewalType = $RenewalType;
      return $this;
    }

}
