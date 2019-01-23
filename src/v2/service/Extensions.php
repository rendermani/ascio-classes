<?php

namespace ascio\v2;

class Extensions
{

    /**
     * @var Extension[] $Extension
     */
    protected $Extension = null;

    /**
     * @param Extension[] $Extension
     */
    public function __construct(array $Extension)
    {
      $this->Extension = $Extension;
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
    public function setExtension(array $Extension)
    {
      $this->Extension = $Extension;
      return $this;
    }

}
