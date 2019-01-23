<?php

namespace ascio\dns;

class WebForward extends Record
{

    /**
     * @var RedirectionType $RedirectionType
     */
    protected $RedirectionType = null;

    /**
     * @param int $Id
     * @param int $Serial
     * @param int $TTL
     * @param RedirectionType $RedirectionType
     */
    public function __construct($Id, $Serial, $TTL, $RedirectionType)
    {
      parent::__construct($Id, $Serial, $TTL);
      $this->RedirectionType = $RedirectionType;
    }

    /**
     * @return RedirectionType
     */
    public function getRedirectionType()
    {
      return $this->RedirectionType;
    }

    /**
     * @param RedirectionType $RedirectionType
     * @return \ascio\dns\WebForward
     */
    public function setRedirectionType($RedirectionType)
    {
      $this->RedirectionType = $RedirectionType;
      return $this;
    }

}
