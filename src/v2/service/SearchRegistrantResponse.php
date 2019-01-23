<?php

namespace ascio\v2;

class SearchRegistrantResponse
{

    /**
     * @var Response $SearchRegistrantResult
     */
    protected $SearchRegistrantResult = null;

    /**
     * @var ArrayOfRegistrant $registrants
     */
    protected $registrants = null;

    /**
     * @param Response $SearchRegistrantResult
     * @param ArrayOfRegistrant $registrants
     */
    public function __construct($SearchRegistrantResult, $registrants)
    {
      $this->SearchRegistrantResult = $SearchRegistrantResult;
      $this->registrants = $registrants;
    }

    /**
     * @return Response
     */
    public function getSearchRegistrantResult()
    {
      return $this->SearchRegistrantResult;
    }

    /**
     * @param Response $SearchRegistrantResult
     * @return \ascio\v2\SearchRegistrantResponse
     */
    public function setSearchRegistrantResult($SearchRegistrantResult)
    {
      $this->SearchRegistrantResult = $SearchRegistrantResult;
      return $this;
    }

    /**
     * @return ArrayOfRegistrant
     */
    public function getRegistrants()
    {
      return $this->registrants;
    }

    /**
     * @param ArrayOfRegistrant $registrants
     * @return \ascio\v2\SearchRegistrantResponse
     */
    public function setRegistrants($registrants)
    {
      $this->registrants = $registrants;
      return $this;
    }

}
