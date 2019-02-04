<?php

namespace ascio\v3;

class GetMessagesResponse extends AbstractResponse
{

    /**
     * @var ArrayOfMessage $Messages
     */
    protected $Messages = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ArrayOfMessage
     */
    public function getMessages()
    {
      return $this->Messages;
    }

    /**
     * @param ArrayOfMessage $Messages
     * @return \ascio\v3\GetMessagesResponse
     */
    public function setMessages($Messages)
    {
      $this->Messages = $Messages;
      return $this;
    }

}
