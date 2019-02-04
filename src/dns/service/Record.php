<?php

namespace ascio\dns;

abstract class Record
{

    /**
     * @var int $Id
     */
    protected $Id = null;

    /**
     * @var int $Serial
     */
    protected $Serial = null;

    /**
     * @var string $Source
     */
    protected $Source = null;

    /**
     * @var int $TTL
     */
    protected $TTL = null;

    /**
     * @var string $Target
     */
    protected $Target = null;

    /**
     * @var \DateTime $UpdatedDate
     */
    protected $UpdatedDate = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \ascio\dns\Record
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return int
     */
    public function getSerial()
    {
      return $this->Serial;
    }

    /**
     * @param int $Serial
     * @return \ascio\dns\Record
     */
    public function setSerial($Serial)
    {
      $this->Serial = $Serial;
      return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
      return $this->Source;
    }

    /**
     * @param string $Source
     * @return \ascio\dns\Record
     */
    public function setSource($Source)
    {
      $this->Source = $Source;
      return $this;
    }

    /**
     * @return int
     */
    public function getTTL()
    {
      return $this->TTL;
    }

    /**
     * @param int $TTL
     * @return \ascio\dns\Record
     */
    public function setTTL($TTL)
    {
      $this->TTL = $TTL;
      return $this;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
      return $this->Target;
    }

    /**
     * @param string $Target
     * @return \ascio\dns\Record
     */
    public function setTarget($Target)
    {
      $this->Target = $Target;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
      if ($this->UpdatedDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->UpdatedDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $UpdatedDate
     * @return \ascio\dns\Record
     */
    public function setUpdatedDate(\DateTime $UpdatedDate = null)
    {
      if ($UpdatedDate == null) {
       $this->UpdatedDate = null;
      } else {
        $this->UpdatedDate = $UpdatedDate->format(\DateTime::ATOM);
      }
      return $this;
    }

}
