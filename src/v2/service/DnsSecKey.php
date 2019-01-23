<?php

namespace ascio\v2;

class DnsSecKey
{

    /**
     * @var string $Handle
     */
    protected $Handle = null;

    /**
     * @var string $Status
     */
    protected $Status = null;

    /**
     * @var string $DigestAlgorithm
     */
    protected $DigestAlgorithm = null;

    /**
     * @var string $DigestType
     */
    protected $DigestType = null;

    /**
     * @var string $Digest
     */
    protected $Digest = null;

    /**
     * @var string $Protocol
     */
    protected $Protocol = null;

    /**
     * @var string $KeyType
     */
    protected $KeyType = null;

    /**
     * @var string $KeyAlgorithm
     */
    protected $KeyAlgorithm = null;

    /**
     * @var string $KeyTag
     */
    protected $KeyTag = null;

    /**
     * @var string $PublicKey
     */
    protected $PublicKey = null;

    /**
     * @var string $CreDate
     */
    protected $CreDate = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getHandle()
    {
      return $this->Handle;
    }

    /**
     * @param string $Handle
     * @return \ascio\v2\DnsSecKey
     */
    public function setHandle($Handle)
    {
      $this->Handle = $Handle;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param string $Status
     * @return \ascio\v2\DnsSecKey
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return string
     */
    public function getDigestAlgorithm()
    {
      return $this->DigestAlgorithm;
    }

    /**
     * @param string $DigestAlgorithm
     * @return \ascio\v2\DnsSecKey
     */
    public function setDigestAlgorithm($DigestAlgorithm)
    {
      $this->DigestAlgorithm = $DigestAlgorithm;
      return $this;
    }

    /**
     * @return string
     */
    public function getDigestType()
    {
      return $this->DigestType;
    }

    /**
     * @param string $DigestType
     * @return \ascio\v2\DnsSecKey
     */
    public function setDigestType($DigestType)
    {
      $this->DigestType = $DigestType;
      return $this;
    }

    /**
     * @return string
     */
    public function getDigest()
    {
      return $this->Digest;
    }

    /**
     * @param string $Digest
     * @return \ascio\v2\DnsSecKey
     */
    public function setDigest($Digest)
    {
      $this->Digest = $Digest;
      return $this;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
      return $this->Protocol;
    }

    /**
     * @param string $Protocol
     * @return \ascio\v2\DnsSecKey
     */
    public function setProtocol($Protocol)
    {
      $this->Protocol = $Protocol;
      return $this;
    }

    /**
     * @return string
     */
    public function getKeyType()
    {
      return $this->KeyType;
    }

    /**
     * @param string $KeyType
     * @return \ascio\v2\DnsSecKey
     */
    public function setKeyType($KeyType)
    {
      $this->KeyType = $KeyType;
      return $this;
    }

    /**
     * @return string
     */
    public function getKeyAlgorithm()
    {
      return $this->KeyAlgorithm;
    }

    /**
     * @param string $KeyAlgorithm
     * @return \ascio\v2\DnsSecKey
     */
    public function setKeyAlgorithm($KeyAlgorithm)
    {
      $this->KeyAlgorithm = $KeyAlgorithm;
      return $this;
    }

    /**
     * @return string
     */
    public function getKeyTag()
    {
      return $this->KeyTag;
    }

    /**
     * @param string $KeyTag
     * @return \ascio\v2\DnsSecKey
     */
    public function setKeyTag($KeyTag)
    {
      $this->KeyTag = $KeyTag;
      return $this;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
      return $this->PublicKey;
    }

    /**
     * @param string $PublicKey
     * @return \ascio\v2\DnsSecKey
     */
    public function setPublicKey($PublicKey)
    {
      $this->PublicKey = $PublicKey;
      return $this;
    }

    /**
     * @return string
     */
    public function getCreDate()
    {
      return $this->CreDate;
    }

    /**
     * @param string $CreDate
     * @return \ascio\v2\DnsSecKey
     */
    public function setCreDate($CreDate)
    {
      $this->CreDate = $CreDate;
      return $this;
    }

}
