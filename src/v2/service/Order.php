<?php

namespace ascio\v2;

class Order
{

    /**
     * @var string $OrderId
     */
    protected $OrderId = null;

    /**
     * @var OrderType $Type
     */
    protected $Type = null;

    /**
     * @var string $AccountReference
     */
    protected $AccountReference = null;

    /**
     * @var OrderStatusType $Status
     */
    protected $Status = null;

    /**
     * @var string $TransactionComment
     */
    protected $TransactionComment = null;

    /**
     * @var string $Comments
     */
    protected $Comments = null;

    /**
     * @var string $Options
     */
    protected $Options = null;

    /**
     * @var string $LocalPresence
     */
    protected $LocalPresence = null;

    /**
     * @var string $Batch
     */
    protected $Batch = null;

    /**
     * @var string $Documentation
     */
    protected $Documentation = null;

    /**
     * @var Domain $Domain
     */
    protected $Domain = null;

    /**
     * @var \DateTime $CreDate
     */
    protected $CreDate = null;

    /**
     * @param OrderType $Type
     * @param OrderStatusType $Status
     */
    public function __construct($Type, $Status)
    {
      $this->Type = $Type;
      $this->Status = $Status;
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
     * @return \ascio\v2\Order
     */
    public function setOrderId($OrderId)
    {
      $this->OrderId = $OrderId;
      return $this;
    }

    /**
     * @return OrderType
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param OrderType $Type
     * @return \ascio\v2\Order
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return string
     */
    public function getAccountReference()
    {
      return $this->AccountReference;
    }

    /**
     * @param string $AccountReference
     * @return \ascio\v2\Order
     */
    public function setAccountReference($AccountReference)
    {
      $this->AccountReference = $AccountReference;
      return $this;
    }

    /**
     * @return OrderStatusType
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param OrderStatusType $Status
     * @return \ascio\v2\Order
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getTransactionComment()
    {
      return $this->TransactionComment;
    }

    /**
     * @param string $TransactionComment
     * @return \ascio\v2\Order
     */
    public function setTransactionComment($TransactionComment)
    {
      $this->TransactionComment = $TransactionComment;
      return $this;
    }

    /**
     * @return string
     */
    public function getComments()
    {
      return $this->Comments;
    }

    /**
     * @param string $Comments
     * @return \ascio\v2\Order
     */
    public function setComments($Comments)
    {
      $this->Comments = $Comments;
      return $this;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
      return $this->Options;
    }

    /**
     * @param string $Options
     * @return \ascio\v2\Order
     */
    public function setOptions($Options)
    {
      $this->Options = $Options;
      return $this;
    }

    /**
     * @return string
     */
    public function getLocalPresence()
    {
      return $this->LocalPresence;
    }

    /**
     * @param string $LocalPresence
     * @return \ascio\v2\Order
     */
    public function setLocalPresence($LocalPresence)
    {
      $this->LocalPresence = $LocalPresence;
      return $this;
    }

    /**
     * @return string
     */
    public function getBatch()
    {
      return $this->Batch;
    }

    /**
     * @param string $Batch
     * @return \ascio\v2\Order
     */
    public function setBatch($Batch)
    {
      $this->Batch = $Batch;
      return $this;
    }

    /**
     * @return string
     */
    public function getDocumentation()
    {
      return $this->Documentation;
    }

    /**
     * @param string $Documentation
     * @return \ascio\v2\Order
     */
    public function setDocumentation($Documentation)
    {
      $this->Documentation = $Documentation;
      return $this;
    }

    /**
     * @return Domain
     */
    public function getDomain()
    {
      return $this->Domain;
    }

    /**
     * @param Domain $Domain
     * @return \ascio\v2\Order
     */
    public function setDomain($Domain)
    {
      $this->Domain = $Domain;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreDate()
    {
      if ($this->CreDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->CreDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $CreDate
     * @return \ascio\v2\Order
     */
    public function setCreDate(\DateTime $CreDate)
    {
      $this->CreDate = $CreDate->format(\DateTime::ATOM);
      return $this;
    }

}
