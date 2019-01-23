<?php

namespace ascio\v2;

class CreateDocumentation
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var ArrayOfAttachment $attachments
     */
    protected $attachments = null;

    /**
     * @param string $sessionId
     * @param ArrayOfAttachment $attachments
     */
    public function __construct($sessionId, $attachments)
    {
      $this->sessionId = $sessionId;
      $this->attachments = $attachments;
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
     * @return \ascio\v2\CreateDocumentation
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return ArrayOfAttachment
     */
    public function getAttachments()
    {
      return $this->attachments;
    }

    /**
     * @param ArrayOfAttachment $attachments
     * @return \ascio\v2\CreateDocumentation
     */
    public function setAttachments($attachments)
    {
      $this->attachments = $attachments;
      return $this;
    }

}
