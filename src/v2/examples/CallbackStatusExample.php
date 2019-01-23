<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$callbackStatus =  new ascio\CallbackStatus();
$callbackStatus->setMessage("MessageTest");