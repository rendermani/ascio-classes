<?php

namespace ascio\v3;

class UploadMessageResponse extends AbstractResponse
{

    /**
     * @var int $MessageId
     */
    protected $MessageId = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return int
     */
    public function getMessageId()
    {
      return $this->MessageId;
    }

    /**
     * @param int $MessageId
     * @return \ascio\v3\UploadMessageResponse
     */
    public function setMessageId($MessageId)
    {
      $this->MessageId = $MessageId;
      return $this;
    }

}
