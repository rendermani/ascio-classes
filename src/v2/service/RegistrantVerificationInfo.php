<?php

namespace ascio\v2;

class RegistrantVerificationInfo
{

    /**
     * @var string $EmailAddress
     */
    protected $EmailAddress = null;

    /**
     * @var RegistrantVerificationStatus $VerificationStatus
     */
    protected $VerificationStatus = null;

    /**
     * @var RegistrantVerificationDetails $VerificationDetails
     */
    protected $VerificationDetails = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
      return $this->EmailAddress;
    }

    /**
     * @param string $EmailAddress
     * @return \ascio\v2\RegistrantVerificationInfo
     */
    public function setEmailAddress($EmailAddress)
    {
      $this->EmailAddress = $EmailAddress;
      return $this;
    }

    /**
     * @return RegistrantVerificationStatus
     */
    public function getVerificationStatus()
    {
      return $this->VerificationStatus;
    }

    /**
     * @param RegistrantVerificationStatus $VerificationStatus
     * @return \ascio\v2\RegistrantVerificationInfo
     */
    public function setVerificationStatus($VerificationStatus)
    {
      $this->VerificationStatus = $VerificationStatus;
      return $this;
    }

    /**
     * @return RegistrantVerificationDetails
     */
    public function getVerificationDetails()
    {
      return $this->VerificationDetails;
    }

    /**
     * @param RegistrantVerificationDetails $VerificationDetails
     * @return \ascio\v2\RegistrantVerificationInfo
     */
    public function setVerificationDetails($VerificationDetails)
    {
      $this->VerificationDetails = $VerificationDetails;
      return $this;
    }

}
