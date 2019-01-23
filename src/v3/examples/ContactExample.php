<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$contact =  new ascio\Contact();
$contact->setFirstName("John");
$contact->setLastName("Doe");
$contact->setOrgName("Ascio");
$contact->setAddress1("Address1Test");
$contact->setCity("CityTest");
$contact->setState("StateTest");
$contact->setPostalCode("888349");
$contact->setCountryCode("DK");
$contact->setEmail("administrator@ascio-test-domain.com");
$contact->setType("owner");