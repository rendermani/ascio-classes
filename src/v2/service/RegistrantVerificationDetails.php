<?php

namespace ascio\v2;

class RegistrantVerificationDetails
{

    /**
     * @var string $VerifiedBy
     */
    protected $VerifiedBy = null;

    /**
     * @var \DateTime $VerificationDate
     */
    protected $VerificationDate = null;

    /**
     * @var ArrayOfMessage $Messages
     */
    protected $Messages = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getVerifiedBy()
    {
      return $this->VerifiedBy;
    }

    /**
     * @param string $VerifiedBy
     * @return \ascio\v2\RegistrantVerificationDetails
     */
    public function setVerifiedBy($VerifiedBy)
    {
      $this->VerifiedBy = $VerifiedBy;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getVerificationDate()
    {
      if ($this->VerificationDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->VerificationDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $VerificationDate
     * @return \ascio\v2\RegistrantVerificationDetails
     */
    public function setVerificationDate(\DateTime $VerificationDate = null)
    {
      if ($VerificationDate == null) {
       $this->VerificationDate = null;
      } else {
        $this->VerificationDate = $VerificationDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return ArrayOfMessage
     */
    public function getMessages()
    {
      return $this->Messages;
    }

    /**
     * @param ArrayOfMessage $Messages
     * @return \ascio\v2\RegistrantVerificationDetails
     */
    public function setMessages($Messages)
    {
      $this->Messages = $Messages;
      return $this;
    }

}
