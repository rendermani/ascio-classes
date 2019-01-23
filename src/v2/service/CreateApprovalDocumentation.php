<?php

namespace ascio\v2;

class CreateApprovalDocumentation
{

    /**
     * @var string $sessionId
     */
    protected $sessionId = null;

    /**
     * @var ApprovalDocumentation $approvalDocumentation
     */
    protected $approvalDocumentation = null;

    /**
     * @param string $sessionId
     * @param ApprovalDocumentation $approvalDocumentation
     */
    public function __construct($sessionId, $approvalDocumentation)
    {
      $this->sessionId = $sessionId;
      $this->approvalDocumentation = $approvalDocumentation;
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
     * @return \ascio\v2\CreateApprovalDocumentation
     */
    public function setSessionId($sessionId)
    {
      $this->sessionId = $sessionId;
      return $this;
    }

    /**
     * @return ApprovalDocumentation
     */
    public function getApprovalDocumentation()
    {
      return $this->approvalDocumentation;
    }

    /**
     * @param ApprovalDocumentation $approvalDocumentation
     * @return \ascio\v2\CreateApprovalDocumentation
     */
    public function setApprovalDocumentation($approvalDocumentation)
    {
      $this->approvalDocumentation = $approvalDocumentation;
      return $this;
    }

}
