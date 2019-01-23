<?php

namespace ascio\v2;

class CreateSupportOrder
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var string $subject
     */
    protected $subject = null;

    /**
     * @var string $body
     */
    protected $body = null;

    /**
     * @var ArrayOfAttachment $attachments
     */
    protected $attachments = null;

    /**
     * @param string $sessionId
     * @param string $subject
     * @param string $body
     * @param ArrayOfAttachment $attachments
     */
    public function __construct($sessionId, $subject, $body, $attachments)
    {
      $this->sessionId = $sessionId;
      $this->subject = $subject;
      $this->body = $body;
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
     * @return \ascio\v2\CreateSupportOrder
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
      return $this->subject;
    }

    /**
     * @param string $subject
     * @return \ascio\v2\CreateSupportOrder
     */
    public function setSubject($subject)
    {
      $this->subject = $subject;
      return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
      return $this->body;
    }

    /**
     * @param string $body
     * @return \ascio\v2\CreateSupportOrder
     */
    public function setBody($body)
    {
      $this->body = $body;
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
     * @return \ascio\v2\CreateSupportOrder
     */
    public function setAttachments($attachments)
    {
      $this->attachments = $attachments;
      return $this;
    }

}
