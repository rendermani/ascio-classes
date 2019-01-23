<?php

namespace ascio\v2;

class ArrayOfNameServer
{

    /**
     * @var NameServer[] $NameServer
     */
    protected $NameServer = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return NameServer[]
     */
    public function getNameServer()
    {
      return $this->NameServer;
    }

    /**
     * @param NameServer[] $NameServer
     * @return \ascio\v2\ArrayOfNameServer
     */
    public function setNameServer(array $NameServer)
    {
      $this->NameServer = $NameServer;
      return $this;
    }

}
