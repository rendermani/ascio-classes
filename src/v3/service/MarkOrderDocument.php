<?php

namespace ascio\v3;

class MarkOrderDocument extends Attachment
{

    /**
     * @var MarkOrderDocType $DocType
     */
    protected $DocType = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return MarkOrderDocType
     */
    public function getDocType()
    {
      return $this->DocType;
    }

    /**
     * @param MarkOrderDocType $DocType
     * @return \ascio\v3\MarkOrderDocument
     */
    public function setDocType($DocType)
    {
      $this->DocType = $DocType;
      return $this;
    }

}
