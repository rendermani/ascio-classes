<?php

namespace ascio\dns;

class WebForward extends Record
{

    /**
     * @var RedirectionType $RedirectionType
     */
    protected $RedirectionType = null;

    /**
     * @param RedirectionType $RedirectionType
     */
    public function __construct($RedirectionType)
    {
      parent::__construct();
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
