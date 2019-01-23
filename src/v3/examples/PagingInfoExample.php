<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$pagingInfo =  new ascio\PagingInfo();
$pagingInfo->setPageIndex(1);
$pagingInfo->setPageSize(1);