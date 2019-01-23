<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$registrant =  new ascio\Registrant();
$registrant->setFirstName("John");
$registrant->setLastName("Doe");
$registrant->setAddress1("Address1Test");
$registrant->setCity("CityTest");
$registrant->setPostalCode("888349");
$registrant->setCountryCode("DK");
$registrant->setEmail("administrator@ascio-test-domain.com");