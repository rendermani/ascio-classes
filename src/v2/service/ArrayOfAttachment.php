<?php

namespace ascio\v2;

class ArrayOfAttachment
{

    /**
     * @var Attachment[] $Attachment
     */
    protected $Attachment = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Attachment[]
     */
    public function getAttachment()
    {
      return $this->Attachment;
    }

    /**
     * @param Attachment[] $Attachment
     * @return \ascio\v2\ArrayOfAttachment
     */
    public function setAttachment(array $Attachment)
    {
      $this->Attachment = $Attachment;
      return $this;
    }

}
