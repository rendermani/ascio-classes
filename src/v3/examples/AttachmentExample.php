<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$attachment =  new ascio\Attachment();
$attachment->setFileName("anything.jpg");
$attachment->setContent(base64_encode(123));