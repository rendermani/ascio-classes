<?php

namespace ascio\v3;

class GetMarkResponse extends AbstractResponse
{

    /**
     * @var MarkInfo $MarkInfo
     */
    protected $MarkInfo = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return MarkInfo
     */
    public function getMarkInfo()
    {
      return $this->MarkInfo;
    }

    /**
     * @param MarkInfo $MarkInfo
     * @return \ascio\v3\GetMarkResponse
     */
    public function setMarkInfo($MarkInfo)
    {
      $this->MarkInfo = $MarkInfo;
      return $this;
    }

}
