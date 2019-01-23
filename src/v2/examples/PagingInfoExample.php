<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$pagingInfo =  new ascio\PagingInfo();
$pagingInfo->setPageIndex(1);
$pagingInfo->setPageSize(1);