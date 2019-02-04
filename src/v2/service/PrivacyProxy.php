<?php

namespace ascio\v2;

class PrivacyProxy
{

    /**
     * @var PrivacyProxyType $Type
     */
    protected $Type = null;

    /**
     * @var boolean $PrivacyAdmin
     */
    protected $PrivacyAdmin = null;

    /**
     * @var boolean $PrivacyTech
     */
    protected $PrivacyTech = null;

    /**
     * @var boolean $PrivacyBilling
     */
    protected $PrivacyBilling = null;

    /**
     * @var Extensions $Extensions
     */
    protected $Extensions = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return PrivacyProxyType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param PrivacyProxyType $Type
     * @return \ascio\v2\PrivacyProxy
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getPrivacyAdmin()
    {
      return $this->PrivacyAdmin;
    }

    /**
     * @param boolean $PrivacyAdmin
     * @return \ascio\v2\PrivacyProxy
     */
    public function setPrivacyAdmin($PrivacyAdmin)
    {
      $this->PrivacyAdmin = $PrivacyAdmin;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getPrivacyTech()
    {
      return $this->PrivacyTech;
    }

    /**
     * @param boolean $PrivacyTech
     * @return \ascio\v2\PrivacyProxy
     */
    public function setPrivacyTech($PrivacyTech)
    {
      $this->PrivacyTech = $PrivacyTech;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getPrivacyBilling()
    {
      return $this->PrivacyBilling;
    }

    /**
     * @param boolean $PrivacyBilling
     * @return \ascio\v2\PrivacyProxy
     */
    public function setPrivacyBilling($PrivacyBilling)
    {
      $this->PrivacyBilling = $PrivacyBilling;
      return $this;
    }

    /**
     * @return Extensions
     */
    public function getExtensions()
    {
      return $this->Extensions;
    }

    /**
     * @param Extensions $Extensions
     * @return \ascio\v2\PrivacyProxy
     */
    public function setExtensions($Extensions)
    {
      $this->Extensions = $Extensions;
      return $this;
    }

}
