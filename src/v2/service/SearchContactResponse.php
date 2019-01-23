<?php

namespace ascio\v2;

class SearchContactResponse
{

    /**
     * @var Response $SearchContactResult
     */
    protected $SearchContactResult = null;

    /**
     * @var ArrayOfContact $contacts
     */
    protected $contacts = null;

    /**
     * @param Response $SearchContactResult
     * @param ArrayOfContact $contacts
     */
    public function __construct($SearchContactResult, $contacts)
    {
      $this->SearchContactResult = $SearchContactResult;
      $this->contacts = $contacts;
    }

    /**
     * @return Response
     */
    public function getSearchContactResult()
    {
      return $this->SearchContactResult;
    }

    /**
     * @param Response $SearchContactResult
     * @return \ascio\v2\SearchContactResponse
     */
    public function setSearchContactResult($SearchContactResult)
    {
      $this->SearchContactResult = $SearchContactResult;
      return $this;
    }

    /**
     * @return ArrayOfContact
     */
    public function getContacts()
    {
      return $this->contacts;
    }

    /**
     * @param ArrayOfContact $contacts
     * @return \ascio\v2\SearchContactResponse
     */
    public function setContacts($contacts)
    {
      $this->contacts = $contacts;
      return $this;
    }

}
