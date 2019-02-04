<?php

namespace ascio\v2;

class Domain
{

    /**
     * @var string $DomainName
     */
    protected $DomainName = null;

    /**
     * @var string $DomainHandle
     */
    protected $DomainHandle = null;

    /**
     * @var int $RegPeriod
     */
    protected $RegPeriod = null;

    /**
     * @var int $RenewPeriod
     */
    protected $RenewPeriod = null;

    /**
     * @var string $Status
     */
    protected $Status = null;

    /**
     * @var string $AuthInfo
     */
    protected $AuthInfo = null;

    /**
     * @var \DateTime $CreDate
     */
    protected $CreDate = null;

    /**
     * @var \DateTime $ExpDate
     */
    protected $ExpDate = null;

    /**
     * @var string $EncodingType
     */
    protected $EncodingType = null;

    /**
     * @var string $DomainPurpose
     */
    protected $DomainPurpose = null;

    /**
     * @var string $Comment
     */
    protected $Comment = null;

    /**
     * @var string $TransferLock
     */
    protected $TransferLock = null;

    /**
     * @var string $DeleteLock
     */
    protected $DeleteLock = null;

    /**
     * @var string $UpdateLock
     */
    protected $UpdateLock = null;

    /**
     * @var string $QueueType
     */
    protected $QueueType = null;

    /**
     * @var Registrant $Registrant
     */
    protected $Registrant = null;

    /**
     * @var Contact $AdminContact
     */
    protected $AdminContact = null;

    /**
     * @var Contact $TechContact
     */
    protected $TechContact = null;

    /**
     * @var Contact $BillingContact
     */
    protected $BillingContact = null;

    /**
     * @var Contact $ResellerContact
     */
    protected $ResellerContact = null;

    /**
     * @var NameServers $NameServers
     */
    protected $NameServers = null;

    /**
     * @var TradeMark $Trademark
     */
    protected $Trademark = null;

    /**
     * @var DnsSecKeys $DnsSecKeys
     */
    protected $DnsSecKeys = null;

    /**
     * @var PrivacyProxy $PrivacyProxy
     */
    protected $PrivacyProxy = null;

    /**
     * @var string $DomainType
     */
    protected $DomainType = null;

    /**
     * @var string $DiscloseSocialData
     */
    protected $DiscloseSocialData = null;

    
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
     * @return \ascio\v2\Domain
     */
    public function setDomainName($DomainName)
    {
      $this->DomainName = $DomainName;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomainHandle()
    {
      return $this->DomainHandle;
    }

    /**
     * @param string $DomainHandle
     * @return \ascio\v2\Domain
     */
    public function setDomainHandle($DomainHandle)
    {
      $this->DomainHandle = $DomainHandle;
      return $this;
    }

    /**
     * @return int
     */
    public function getRegPeriod()
    {
      return $this->RegPeriod;
    }

    /**
     * @param int $RegPeriod
     * @return \ascio\v2\Domain
     */
    public function setRegPeriod($RegPeriod)
    {
      $this->RegPeriod = $RegPeriod;
      return $this;
    }

    /**
     * @return int
     */
    public function getRenewPeriod()
    {
      return $this->RenewPeriod;
    }

    /**
     * @param int $RenewPeriod
     * @return \ascio\v2\Domain
     */
    public function setRenewPeriod($RenewPeriod)
    {
      $this->RenewPeriod = $RenewPeriod;
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
     * @return \ascio\v2\Domain
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getAuthInfo()
    {
      return $this->AuthInfo;
    }

    /**
     * @param string $AuthInfo
     * @return \ascio\v2\Domain
     */
    public function setAuthInfo($AuthInfo)
    {
      $this->AuthInfo = $AuthInfo;
      return $this;
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
     * @return \ascio\v2\Domain
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
     * @return \DateTime
     */
    public function getExpDate()
    {
      if ($this->ExpDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ExpDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ExpDate
     * @return \ascio\v2\Domain
     */
    public function setExpDate(\DateTime $ExpDate = null)
    {
      if ($ExpDate == null) {
       $this->ExpDate = null;
      } else {
        $this->ExpDate = $ExpDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return string
     */
    public function getEncodingType()
    {
      return $this->EncodingType;
    }

    /**
     * @param string $EncodingType
     * @return \ascio\v2\Domain
     */
    public function setEncodingType($EncodingType)
    {
      $this->EncodingType = $EncodingType;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomainPurpose()
    {
      return $this->DomainPurpose;
    }

    /**
     * @param string $DomainPurpose
     * @return \ascio\v2\Domain
     */
    public function setDomainPurpose($DomainPurpose)
    {
      $this->DomainPurpose = $DomainPurpose;
      return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
      return $this->Comment;
    }

    /**
     * @param string $Comment
     * @return \ascio\v2\Domain
     */
    public function setComment($Comment)
    {
      $this->Comment = $Comment;
      return $this;
    }

    /**
     * @return string
     */
    public function getTransferLock()
    {
      return $this->TransferLock;
    }

    /**
     * @param string $TransferLock
     * @return \ascio\v2\Domain
     */
    public function setTransferLock($TransferLock)
    {
      $this->TransferLock = $TransferLock;
      return $this;
    }

    /**
     * @return string
     */
    public function getDeleteLock()
    {
      return $this->DeleteLock;
    }

    /**
     * @param string $DeleteLock
     * @return \ascio\v2\Domain
     */
    public function setDeleteLock($DeleteLock)
    {
      $this->DeleteLock = $DeleteLock;
      return $this;
    }

    /**
     * @return string
     */
    public function getUpdateLock()
    {
      return $this->UpdateLock;
    }

    /**
     * @param string $UpdateLock
     * @return \ascio\v2\Domain
     */
    public function setUpdateLock($UpdateLock)
    {
      $this->UpdateLock = $UpdateLock;
      return $this;
    }

    /**
     * @return string
     */
    public function getQueueType()
    {
      return $this->QueueType;
    }

    /**
     * @param string $QueueType
     * @return \ascio\v2\Domain
     */
    public function setQueueType($QueueType)
    {
      $this->QueueType = $QueueType;
      return $this;
    }

    /**
     * @return Registrant
     */
    public function getRegistrant()
    {
      return $this->Registrant;
    }

    /**
     * @param Registrant $Registrant
     * @return \ascio\v2\Domain
     */
    public function setRegistrant($Registrant)
    {
      $this->Registrant = $Registrant;
      return $this;
    }

    /**
     * @return Contact
     */
    public function getAdminContact()
    {
      return $this->AdminContact;
    }

    /**
     * @param Contact $AdminContact
     * @return \ascio\v2\Domain
     */
    public function setAdminContact($AdminContact)
    {
      $this->AdminContact = $AdminContact;
      return $this;
    }

    /**
     * @return Contact
     */
    public function getTechContact()
    {
      return $this->TechContact;
    }

    /**
     * @param Contact $TechContact
     * @return \ascio\v2\Domain
     */
    public function setTechContact($TechContact)
    {
      $this->TechContact = $TechContact;
      return $this;
    }

    /**
     * @return Contact
     */
    public function getBillingContact()
    {
      return $this->BillingContact;
    }

    /**
     * @param Contact $BillingContact
     * @return \ascio\v2\Domain
     */
    public function setBillingContact($BillingContact)
    {
      $this->BillingContact = $BillingContact;
      return $this;
    }

    /**
     * @return Contact
     */
    public function getResellerContact()
    {
      return $this->ResellerContact;
    }

    /**
     * @param Contact $ResellerContact
     * @return \ascio\v2\Domain
     */
    public function setResellerContact($ResellerContact)
    {
      $this->ResellerContact = $ResellerContact;
      return $this;
    }

    /**
     * @return NameServers
     */
    public function getNameServers()
    {
      return $this->NameServers;
    }

    /**
     * @param NameServers $NameServers
     * @return \ascio\v2\Domain
     */
    public function setNameServers($NameServers)
    {
      $this->NameServers = $NameServers;
      return $this;
    }

    /**
     * @return TradeMark
     */
    public function getTrademark()
    {
      return $this->Trademark;
    }

    /**
     * @param TradeMark $Trademark
     * @return \ascio\v2\Domain
     */
    public function setTrademark($Trademark)
    {
      $this->Trademark = $Trademark;
      return $this;
    }

    /**
     * @return DnsSecKeys
     */
    public function getDnsSecKeys()
    {
      return $this->DnsSecKeys;
    }

    /**
     * @param DnsSecKeys $DnsSecKeys
     * @return \ascio\v2\Domain
     */
    public function setDnsSecKeys($DnsSecKeys)
    {
      $this->DnsSecKeys = $DnsSecKeys;
      return $this;
    }

    /**
     * @return PrivacyProxy
     */
    public function getPrivacyProxy()
    {
      return $this->PrivacyProxy;
    }

    /**
     * @param PrivacyProxy $PrivacyProxy
     * @return \ascio\v2\Domain
     */
    public function setPrivacyProxy($PrivacyProxy)
    {
      $this->PrivacyProxy = $PrivacyProxy;
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
     * @return \ascio\v2\Domain
     */
    public function setDomainType($DomainType)
    {
      $this->DomainType = $DomainType;
      return $this;
    }

    /**
     * @return string
     */
    public function getDiscloseSocialData()
    {
      return $this->DiscloseSocialData;
    }

    /**
     * @param string $DiscloseSocialData
     * @return \ascio\v2\Domain
     */
    public function setDiscloseSocialData($DiscloseSocialData)
    {
      $this->DiscloseSocialData = $DiscloseSocialData;
      return $this;
    }

}
