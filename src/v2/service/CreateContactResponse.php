<?php

namespace ascio\v2;

class CreateContactResponse
{

    /**
     * @var Response $CreateContactResult
     */
    protected $CreateContactResult = null;

    /**
     * @var Contact $contact
     */
    protected $contact = null;

    /**
     * @param Response $CreateContactResult
     * @param Contact $contact
     */
    public function __construct($CreateContactResult, $contact)
    {
      $this->CreateContactResult = $CreateContactResult;
      $this->contact = $contact;
    }

    /**
     * @return Response
     */
    public function getCreateContactResult()
    {
      return $this->CreateContactResult;
    }

    /**
     * @param Response $CreateContactResult
     * @return \ascio\v2\CreateContactResponse
     */
    public function setCreateContactResult($CreateContactResult)
    {
      $this->CreateContactResult = $CreateContactResult;
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
     * @return \ascio\v2\CreateContactResponse
     */
    public function setContact($contact)
    {
      $this->contact = $contact;
      return $this;
    }

}
