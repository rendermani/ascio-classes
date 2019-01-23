<?php

namespace ascio\v2;

class CreateContact
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var Contact $contact
     */
    protected $contact = null;

    /**
     * @param string $sessionId
     * @param Contact $contact
     */
    public function __construct($sessionId, $contact)
    {
      $this->sessionId = $sessionId;
      $this->contact = $contact;
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
     * @return \ascio\v2\CreateContact
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
      return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return \ascio\v2\CreateContact
     */
    public function setContact($contact)
    {
      $this->contact = $contact;
      return $this;
    }

}
