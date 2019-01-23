<?php

namespace ascio\v2;

class GetMessagesResponse
{

    /**
     * @var Response $GetMessagesResult
     */
    protected $GetMessagesResult = null;

    /**
     * @var ArrayOfMessage $messages
     */
    protected $messages = null;

    /**
     * @param Response $GetMessagesResult
     * @param ArrayOfMessage $messages
     */
    public function __construct($GetMessagesResult, $messages)
    {
      $this->GetMessagesResult = $GetMessagesResult;
      $this->messages = $messages;
    }

    /**
     * @return Response
     */
    public function getGetMessagesResult()
    {
      return $this->GetMessagesResult;
    }

    /**
     * @param Response $GetMessagesResult
     * @return \ascio\v2\GetMessagesResponse
     */
    public function setGetMessagesResult($GetMessagesResult)
    {
      $this->GetMessagesResult = $GetMessagesResult;
      return $this;
    }

    /**
     * @return ArrayOfMessage
     */
    public function getMessages()
    {
      return $this->messages;
    }

    /**
     * @param ArrayOfMessage $messages
     * @return \ascio\v2\GetMessagesResponse
     */
    public function setMessages($messages)
    {
      $this->messages = $messages;
      return $this;
    }

}
