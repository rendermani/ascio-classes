<?php

namespace ascio\v3;

class GetSslCertificateResponse extends AbstractResponse
{

    /**
     * @var SslCertificateInfo $SslCertificateInfo
     */
    protected $SslCertificateInfo = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return SslCertificateInfo
     */
    public function getSslCertificateInfo()
    {
      return $this->SslCertificateInfo;
    }

    /**
     * @param SslCertificateInfo $SslCertificateInfo
     * @return \ascio\v3\GetSslCertificateResponse
     */
    public function setSslCertificateInfo($SslCertificateInfo)
    {
      $this->SslCertificateInfo = $SslCertificateInfo;
      return $this;
    }

}
