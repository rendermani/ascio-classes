<?php

namespace ascio\v2;

class QueueItem
{

    /**
     * @var ArrayOfAttachment $Attachments
     */
    protected $Attachments = null;

    /**
     * @var string $DomainHandle
     */
    protected $DomainHandle = null;

    /**
     * @var string $DomainName
     */
    protected $DomainName = null;

    /**
     * @var string $Msg
     */
    protected $Msg = null;

    /**
     * @var int $MsgId
     */
    protected $MsgId = null;

    /**
     * @var MessageType $MsgType
     */
    protected $MsgType = null;

    /**
     * @var string $OrderId
     */
    protected $OrderId = null;

    /**
     * @var OrderStatusType $OrderStatus
     */
    protected $OrderStatus = null;

    /**
     * @var ArrayOfCallbackStatus $StatusList
     */
    protected $StatusList = null;

    
    public function __construct()
    {
    
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
     * @return \ascio\v2\QueueItem
     */
    public function setAttachments($Attachments)
    {
      $this->Attachments = $Attachments;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomainHandle()
    {
      return $this->DomainHandle;
    }

    /**
     * @param string $DomainHandle
     * @return \ascio\v2\QueueItem
     */
    public function setDomainHandle($DomainHandle)
    {
      $this->DomainHandle = $DomainHandle;
      return $this;
    }

    /**
     * @return string
     */
    public function getDomainName()
    {
      return $this->DomainName;
    }

    /**
     * @param string $DomainName
     * @return \ascio\v2\QueueItem
     */
    public function setDomainName($DomainName)
    {
      $this->DomainName = $DomainName;
      return $this;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
      return $this->Msg;
    }

    /**
     * @param string $Msg
     * @return \ascio\v2\QueueItem
     */
    public function setMsg($Msg)
    {
      $this->Msg = $Msg;
      return $this;
    }

    /**
     * @return int
     */
    public function getMsgId()
    {
      return $this->MsgId;
    }

    /**
     * @param int $MsgId
     * @return \ascio\v2\QueueItem
     */
    public function setMsgId($MsgId)
    {
      $this->MsgId = $MsgId;
      return $this;
    }

    /**
     * @return MessageType
     */
    public function getMsgType()
    {
      return $this->MsgType;
    }

    /**
     * @param MessageType $MsgType
     * @return \ascio\v2\QueueItem
     */
    public function setMsgType($MsgType)
    {
      $this->MsgType = $MsgType;
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
     * @return \ascio\v2\QueueItem
     */
    public function setOrderId($OrderId)
    {
      $this->OrderId = $OrderId;
      return $this;
    }

    /**
     * @return OrderStatusType
     */
    public function getOrderStatus()
    {
      return $this->OrderStatus;
    }

    /**
     * @param OrderStatusType $OrderStatus
     * @return \ascio\v2\QueueItem
     */
    public function setOrderStatus($OrderStatus)
    {
      $this->OrderStatus = $OrderStatus;
      return $this;
    }

    /**
     * @return ArrayOfCallbackStatus
     */
    public function getStatusList()
    {
      return $this->StatusList;
    }

    /**
     * @param ArrayOfCallbackStatus $StatusList
     * @return \ascio\v2\QueueItem
     */
    public function setStatusList($StatusList)
    {
      $this->StatusList = $StatusList;
      return $this;
    }

}
