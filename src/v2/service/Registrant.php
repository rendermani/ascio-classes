<?php

namespace ascio\v2;

class Registrant
{

    /**
     * @var \DateTime $CreDate
     */
    protected $CreDate = null;

    /**
     * @var string $Status
     */
    protected $Status = null;

    /**
     * @var string $Handle
     */
    protected $Handle = null;

    /**
     * @var string $Name
     */
    protected $Name = null;

    /**
     * @var string $OrgName
     */
    protected $OrgName = null;

    /**
     * @var string $Address1
     */
    protected $Address1 = null;

    /**
     * @var string $Address2
     */
    protected $Address2 = null;

    /**
     * @var string $City
     */
    protected $City = null;

    /**
     * @var string $State
     */
    protected $State = null;

    /**
     * @var string $PostalCode
     */
    protected $PostalCode = null;

    /**
     * @var string $CountryCode
     */
    protected $CountryCode = null;

    /**
     * @var string $Email
     */
    protected $Email = null;

    /**
     * @var string $Phone
     */
    protected $Phone = null;

    /**
     * @var string $Fax
     */
    protected $Fax = null;

    /**
     * @var string $RegistrantType
     */
    protected $RegistrantType = null;

    /**
     * @var string $VatNumber
     */
    protected $VatNumber = null;

    /**
     * @var string $RegistrantDate
     */
    protected $RegistrantDate = null;

    /**
     * @var string $NexusCategory
     */
    protected $NexusCategory = null;

    /**
     * @var string $RegistrantNumber
     */
    protected $RegistrantNumber = null;

    /**
     * @var string $Details
     */
    protected $Details = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return \DateTime
     */
    public function getCreDate()
    {
      if ($this->CreDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->CreDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $CreDate
     * @return \ascio\v2\Registrant
     */
    public function setCreDate(\DateTime $CreDate = null)
    {
      if ($CreDate == null) {
       $this->CreDate = null;
      } else {
        $this->CreDate = $CreDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param string $Status
     * @return \ascio\v2\Registrant
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getHandle()
    {
      return $this->Handle;
    }

    /**
     * @param string $Handle
     * @return \ascio\v2\Registrant
     */
    public function setHandle($Handle)
    {
      $this->Handle = $Handle;
      return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param string $Name
     * @return \ascio\v2\Registrant
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return string
     */
    public function getOrgName()
    {
      return $this->OrgName;
    }

    /**
     * @param string $OrgName
     * @return \ascio\v2\Registrant
     */
    public function setOrgName($OrgName)
    {
      $this->OrgName = $OrgName;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
      return $this->Address1;
    }

    /**
     * @param string $Address1
     * @return \ascio\v2\Registrant
     */
    public function setAddress1($Address1)
    {
      $this->Address1 = $Address1;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
      return $this->Address2;
    }

    /**
     * @param string $Address2
     * @return \ascio\v2\Registrant
     */
    public function setAddress2($Address2)
    {
      $this->Address2 = $Address2;
      return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
      return $this->City;
    }

    /**
     * @param string $City
     * @return \ascio\v2\Registrant
     */
    public function setCity($City)
    {
      $this->City = $City;
      return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
      return $this->State;
    }

    /**
     * @param string $State
     * @return \ascio\v2\Registrant
     */
    public function setState($State)
    {
      $this->State = $State;
      return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
      return $this->PostalCode;
    }

    /**
     * @param string $PostalCode
     * @return \ascio\v2\Registrant
     */
    public function setPostalCode($PostalCode)
    {
      $this->PostalCode = $PostalCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
      return $this->CountryCode;
    }

    /**
     * @param string $CountryCode
     * @return \ascio\v2\Registrant
     */
    public function setCountryCode($CountryCode)
    {
      $this->CountryCode = $CountryCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
      return $this->Email;
    }

    /**
     * @param string $Email
     * @return \ascio\v2\Registrant
     */
    public function setEmail($Email)
    {
      $this->Email = $Email;
      return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
      return $this->Phone;
    }

    /**
     * @param string $Phone
     * @return \ascio\v2\Registrant
     */
    public function setPhone($Phone)
    {
      $this->Phone = $Phone;
      return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
      return $this->Fax;
    }

    /**
     * @param string $Fax
     * @return \ascio\v2\Registrant
     */
    public function setFax($Fax)
    {
      $this->Fax = $Fax;
      return $this;
    }

    /**
     * @return string
     */
    public function getRegistrantType()
    {
      return $this->RegistrantType;
    }

    /**
     * @param string $RegistrantType
     * @return \ascio\v2\Registrant
     */
    public function setRegistrantType($RegistrantType)
    {
      $this->RegistrantType = $RegistrantType;
      return $this;
    }

    /**
     * @return string
     */
    public function getVatNumber()
    {
      return $this->VatNumber;
    }

    /**
     * @param string $VatNumber
     * @return \ascio\v2\Registrant
     */
    public function setVatNumber($VatNumber)
    {
      $this->VatNumber = $VatNumber;
      return $this;
    }

    /**
     * @return string
     */
    public function getRegistrantDate()
    {
      return $this->RegistrantDate;
    }

    /**
     * @param string $RegistrantDate
     * @return \ascio\v2\Registrant
     */
    public function setRegistrantDate($RegistrantDate)
    {
      $this->RegistrantDate = $RegistrantDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getNexusCategory()
    {
      return $this->NexusCategory;
    }

    /**
     * @param string $NexusCategory
     * @return \ascio\v2\Registrant
     */
    public function setNexusCategory($NexusCategory)
    {
      $this->NexusCategory = $NexusCategory;
      return $this;
    }

    /**
     * @return string
     */
    public function getRegistrantNumber()
    {
      return $this->RegistrantNumber;
    }

    /**
     * @param string $RegistrantNumber
     * @return \ascio\v2\Registrant
     */
    public function setRegistrantNumber($RegistrantNumber)
    {
      $this->RegistrantNumber = $RegistrantNumber;
      return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
      return $this->Details;
    }

    /**
     * @param string $Details
     * @return \ascio\v2\Registrant
     */
    public function setDetails($Details)
    {
      $this->Details = $Details;
      return $this;
    }

}
