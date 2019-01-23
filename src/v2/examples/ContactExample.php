<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$contact =  new ascio\Contact();
$contact->setFirstName("John");
$contact->setLastName("Doe");
$contact->setAddress1("Address1Test");
$contact->setPostalCode("888349");
$contact->setCity("CityTest");
$contact->setCountryCode("DK");
$contact->setEmail("administrator@ascio-test-domain.com");
$contact->setPhone("+45.123456789");
$contact->setType("owner");