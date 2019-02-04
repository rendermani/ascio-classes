<?php

namespace ascio\v2;

class TradeMark
{

    /**
     * @var string $Name
     */
    protected $Name = null;

    /**
     * @var string $Country
     */
    protected $Country = null;

    /**
     * @var \DateTime $Date
     */
    protected $Date = null;

    /**
     * @var string $Number
     */
    protected $Number = null;

    /**
     * @var string $Type
     */
    protected $Type = null;

    /**
     * @var string $Contact
     */
    protected $Contact = null;

    /**
     * @var string $ContactLanguage
     */
    protected $ContactLanguage = null;

    /**
     * @var string $DocumentationLanguage
     */
    protected $DocumentationLanguage = null;

    /**
     * @var string $SecondContact
     */
    protected $SecondContact = null;

    /**
     * @var string $ThirdContact
     */
    protected $ThirdContact = null;

    /**
     * @var \DateTime $RegDate
     */
    protected $RegDate = null;

    
    public function __construct()
    {
    
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
     * @return \ascio\v2\TradeMark
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
      return $this->Country;
    }

    /**
     * @param string $Country
     * @return \ascio\v2\TradeMark
     */
    public function setCountry($Country)
    {
      $this->Country = $Country;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
      if ($this->Date == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->Date);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $Date
     * @return \ascio\v2\TradeMark
     */
    public function setDate(\DateTime $Date = null)
    {
      if ($Date == null) {
       $this->Date = null;
      } else {
        $this->Date = $Date->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
      return $this->Number;
    }

    /**
     * @param string $Number
     * @return \ascio\v2\TradeMark
     */
    public function setNumber($Number)
    {
      $this->Number = $Number;
      return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param string $Type
     * @return \ascio\v2\TradeMark
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return string
     */
    public function getContact()
    {
      return $this->Contact;
    }

    /**
     * @param string $Contact
     * @return \ascio\v2\TradeMark
     */
    public function setContact($Contact)
    {
      $this->Contact = $Contact;
      return $this;
    }

    /**
     * @return string
     */
    public function getContactLanguage()
    {
      return $this->ContactLanguage;
    }

    /**
     * @param string $ContactLanguage
     * @return \ascio\v2\TradeMark
     */
    public function setContactLanguage($ContactLanguage)
    {
      $this->ContactLanguage = $ContactLanguage;
      return $this;
    }

    /**
     * @return string
     */
    public function getDocumentationLanguage()
    {
      return $this->DocumentationLanguage;
    }

    /**
     * @param string $DocumentationLanguage
     * @return \ascio\v2\TradeMark
     */
    public function setDocumentationLanguage($DocumentationLanguage)
    {
      $this->DocumentationLanguage = $DocumentationLanguage;
      return $this;
    }

    /**
     * @return string
     */
    public function getSecondContact()
    {
      return $this->SecondContact;
    }

    /**
     * @param string $SecondContact
     * @return \ascio\v2\TradeMark
     */
    public function setSecondContact($SecondContact)
    {
      $this->SecondContact = $SecondContact;
      return $this;
    }

    /**
     * @return string
     */
    public function getThirdContact()
    {
      return $this->ThirdContact;
    }

    /**
     * @param string $ThirdContact
     * @return \ascio\v2\TradeMark
     */
    public function setThirdContact($ThirdContact)
    {
      $this->ThirdContact = $ThirdContact;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegDate()
    {
      if ($this->RegDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->RegDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $RegDate
     * @return \ascio\v2\TradeMark
     */
    public function setRegDate(\DateTime $RegDate = null)
    {
      if ($RegDate == null) {
       $this->RegDate = null;
      } else {
        $this->RegDate = $RegDate->format(\DateTime::ATOM);
      }
      return $this;
    }

}
