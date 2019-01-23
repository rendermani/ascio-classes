<?php

namespace ascio\v2;

class Attachment
{

    /**
     * @var base64Binary $Data
     */
    protected $Data = null;

    /**
     * @var string $FileName
     */
    protected $FileName = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return base64Binary
     */
    public function getData()
    {
      return $this->Data;
    }

    /**
     * @param base64Binary $Data
     * @return \ascio\v2\Attachment
     */
    public function setData($Data)
    {
      $this->Data = $Data;
      return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
      return $this->FileName;
    }

    /**
     * @param string $FileName
     * @return \ascio\v2\Attachment
     */
    public function setFileName($FileName)
    {
      $this->FileName = $FileName;
      return $this;
    }

}
