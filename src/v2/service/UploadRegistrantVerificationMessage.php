<?php

namespace ascio\v2;

class UploadRegistrantVerificationMessage
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $value
     */
    protected $value = null;

    /**
     * @var RegistrantVerificationDetails $details
     */
    protected $details = null;

    /**
     * @param string $sessionId
     * @param string $value
     * @param RegistrantVerificationDetails $details
     */
    public function __construct($sessionId, $value, $details)
    {
      $this->sessionId = $sessionId;
      $this->value = $value;
      $this->details = $details;
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
     * @return \ascio\v2\UploadRegistrantVerificationMessage
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param string $value
     * @return \ascio\v2\UploadRegistrantVerificationMessage
     */
    public function setValue($value)
    {
      $this->value = $value;
      return $this;
    }

    /**
     * @return RegistrantVerificationDetails
     */
    public function getDetails()
    {
      return $this->details;
    }

    /**
     * @param RegistrantVerificationDetails $details
     * @return \ascio\v2\UploadRegistrantVerificationMessage
     */
    public function setDetails($details)
    {
      $this->details = $details;
      return $this;
    }

}
