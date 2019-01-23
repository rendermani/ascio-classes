<?php

namespace ascio\v2;

class GetContactResponse
{

    /**
     * @var Response $GetContactResult
     */
    protected $GetContactResult = null;

    /**
     * @var Contact $contact
     */
    protected $contact = null;

    /**
     * @param Response $GetContactResult
     * @param Contact $contact
     */
    public function __construct($GetContactResult, $contact)
    {
      $this->GetContactResult = $GetContactResult;
      $this->contact = $contact;
    }

    /**
     * @return Response
     */
    public function getGetContactResult()
    {
      return $this->GetContactResult;
    }

    /**
     * @param Response $GetContactResult
     * @return \ascio\v2\GetContactResponse
     */
    public function setGetContactResult($GetContactResult)
    {
      $this->GetContactResult = $GetContactResult;
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
     * @return \ascio\v2\GetContactResponse
     */
    public function setContact($contact)
    {
      $this->contact = $contact;
      return $this;
    }

}
