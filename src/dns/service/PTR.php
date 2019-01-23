<?php

namespace ascio\dns;

class PTR extends Record
{

    /**
     * @param int $Id
     * @param int $Serial
     * @param int $TTL
     */
    public function __construct($Id, $Serial, $TTL)
    {
      parent::__construct($Id, $Serial, $TTL);
    }

}
