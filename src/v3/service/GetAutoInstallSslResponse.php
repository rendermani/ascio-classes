<?php

namespace ascio\v3;

class GetAutoInstallSslResponse extends AbstractResponse
{

    /**
     * @var AutoInstallSslInfo $AutoInstallSslInfo
     */
    protected $AutoInstallSslInfo = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AutoInstallSslInfo
     */
    public function getAutoInstallSslInfo()
    {
      return $this->AutoInstallSslInfo;
    }

    /**
     * @param AutoInstallSslInfo $AutoInstallSslInfo
     * @return \ascio\v3\GetAutoInstallSslResponse
     */
    public function setAutoInstallSslInfo($AutoInstallSslInfo)
    {
      $this->AutoInstallSslInfo = $AutoInstallSslInfo;
      return $this;
    }

}
