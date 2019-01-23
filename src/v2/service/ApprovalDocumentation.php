<?php

namespace ascio\v2;

class ApprovalDocumentation
{

    /**
     * @var ApprovalDocumentationType $Type
     */
    protected $Type = null;

    /**
     * @var ArrayOfstring $ObjectNames
     */
    protected $ObjectNames = null;

    /**
     * @var string $OrderId
     */
    protected $OrderId = null;

    /**
     * @var ArrayOfAttachment $Attachments
     */
    protected $Attachments = null;

    /**
     * @var Extensions $Extensions
     */
    protected $Extensions = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ApprovalDocumentationType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param ApprovalDocumentationType $Type
     * @return \ascio\v2\ApprovalDocumentation
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return ArrayOfstring
     */
    public function getObjectNames()
    {
      return $this->ObjectNames;
    }

    /**
     * @param ArrayOfstring $ObjectNames
     * @return \ascio\v2\ApprovalDocumentation
     */
    public function setObjectNames($ObjectNames)
    {
      $this->ObjectNames = $ObjectNames;
      return $this;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
      return $this->OrderId;
    }

    /**
     * @param string $OrderId
     * @return \ascio\v2\ApprovalDocumentation
     */
    public function setOrderId($OrderId)
    {
      $this->OrderId = $OrderId;
      return $this;
    }

    /**
     * @return ArrayOfAttachment
     */
    public function getAttachments()
    {
      return $this->Attachments;
    }

    /**
     * @param ArrayOfAttachment $Attachments
     * @return \ascio\v2\ApprovalDocumentation
     */
    public function setAttachments($Attachments)
    {
      $this->Attachments = $Attachments;
      return $this;
    }

    /**
     * @return Extensions
     */
    public function getExtensions()
    {
      return $this->Extensions;
    }

    /**
     * @param Extensions $Extensions
     * @return \ascio\v2\ApprovalDocumentation
     */
    public function setExtensions($Extensions)
    {
      $this->Extensions = $Extensions;
      return $this;
    }

}
