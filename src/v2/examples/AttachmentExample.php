<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$attachment =  new ascio\Attachment();
$attachment->setData("DataTest");
$attachment->setFileName("anything.jpg");