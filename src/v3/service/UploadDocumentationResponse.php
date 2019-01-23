<?php

namespace ascio\v3;

class UploadDocumentationResponse extends AbstractResponse
{

    /**
     * @param int $ResultCode
     */
    public function __construct($ResultCode)
    {
      parent::__construct($ResultCode);
    }

}
