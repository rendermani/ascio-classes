<?php

namespace ascio\v2;

class Extensions
{

    /**
     * @var Extension[] $Extension
     */
    protected $Extension = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Extension[]
     */
    public function getExtension()
    {
      return $this->Extension;
    }

    /**
     * @param Extension[] $Extension
     * @return \ascio\v2\Extensions
     */
    public function setExtension(array $Extension = null)
    {
      $this->Extension = $Extension;
      return $this;
    }

}
