<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$mark =  new ascio\TreatyOrStatuteMark();


$markInfo =  new ascio\MarkInfo();
$markInfo->setCreated(new \DateTime());
$markInfo->setExpires(new \DateTime());
$markInfo->setMark($mark);
$markInfo->setSmd("SmdTest");