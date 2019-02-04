<?php

namespace ascio\v2;

class SearchOrderRequest
{

    /**
     * @var ArrayOfOrderType $OrderTypes
     */
    protected $OrderTypes = null;

    /**
     * @var ArrayOfOrderStatusType $OrderStatusTypes
     */
    protected $OrderStatusTypes = null;

    /**
     * @var \DateTime $FromDate
     */
    protected $FromDate = null;

    /**
     * @var \DateTime $ToDate
     */
    protected $ToDate = null;

    /**
     * @var string $DomainName
     */
    protected $DomainName = null;

    /**
     * @var string $TransactionComment
     */
    protected $TransactionComment = null;

    /**
     * @var string $Comments
     */
    protected $Comments = null;

    /**
     * @var boolean $IncludeDomainDetails
     */
    protected $IncludeDomainDetails = null;

    /**
     * @var PagingInfo $PageInfo
     */
    protected $PageInfo = null;

    /**
     * @var SearchOrderSortType $OrderSort
     */
    protected $OrderSort = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfOrderType
     */
    public function getOrderTypes()
    {
      return $this->OrderTypes;
    }

    /**
     * @param ArrayOfOrderType $OrderTypes
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setOrderTypes($OrderTypes)
    {
      $this->OrderTypes = $OrderTypes;
      return $this;
    }

    /**
     * @return ArrayOfOrderStatusType
     */
    public function getOrderStatusTypes()
    {
      return $this->OrderStatusTypes;
    }

    /**
     * @param ArrayOfOrderStatusType $OrderStatusTypes
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setOrderStatusTypes($OrderStatusTypes)
    {
      $this->OrderStatusTypes = $OrderStatusTypes;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFromDate()
    {
      if ($this->FromDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->FromDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $FromDate
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setFromDate(\DateTime $FromDate = null)
    {
      if ($FromDate == null) {
       $this->FromDate = null;
      } else {
        $this->FromDate = $FromDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getToDate()
    {
      if ($this->ToDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ToDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ToDate
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setToDate(\DateTime $ToDate = null)
    {
      if ($ToDate == null) {
       $this->ToDate = null;
      } else {
        $this->ToDate = $ToDate->format(\DateTime::ATOM);
      }
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
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setDomainName($DomainName)
    {
      $this->DomainName = $DomainName;
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
     * @return \ascio\v2\SearchOrderRequest
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
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setComments($Comments)
    {
      $this->Comments = $Comments;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIncludeDomainDetails()
    {
      return $this->IncludeDomainDetails;
    }

    /**
     * @param boolean $IncludeDomainDetails
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setIncludeDomainDetails($IncludeDomainDetails)
    {
      $this->IncludeDomainDetails = $IncludeDomainDetails;
      return $this;
    }

    /**
     * @return PagingInfo
     */
    public function getPageInfo()
    {
      return $this->PageInfo;
    }

    /**
     * @param PagingInfo $PageInfo
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setPageInfo($PageInfo)
    {
      $this->PageInfo = $PageInfo;
      return $this;
    }

    /**
     * @return SearchOrderSortType
     */
    public function getOrderSort()
    {
      return $this->OrderSort;
    }

    /**
     * @param SearchOrderSortType $OrderSort
     * @return \ascio\v2\SearchOrderRequest
     */
    public function setOrderSort($OrderSort)
    {
      $this->OrderSort = $OrderSort;
      return $this;
    }

}
