<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$session =  new ascio\Session();
$session->setAccount("AccountTest");
$session->setPassword("PasswordTest");