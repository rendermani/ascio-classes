<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$registrant =  new ascio\Registrant();
$registrant->setName("John Doe");
$registrant->setAddress1("Address1Test");
$registrant->setCity("CityTest");
$registrant->setPostalCode("888349");
$registrant->setCountryCode("DK");
$registrant->setEmail("administrator@ascio-test-domain.com");
$registrant->setPhone("+45.123456789");