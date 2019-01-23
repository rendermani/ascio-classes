<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$owner =  new ascio\Registrant();
$owner->setFirstName("John");
$owner->setLastName("Doe");
$owner->setAddress1("Address1Test");
$owner->setCity("CityTest");
$owner->setPostalCode("888349");
$owner->setCountryCode("DK");
$owner->setEmail("administrator@ascio-test-domain.com");


$admin =  new ascio\Contact();
$admin->setFirstName("John");
$admin->setLastName("Doe");
$admin->setOrgName("Ascio");
$admin->setAddress1("Address1Test");
$admin->setCity("CityTest");
$admin->setState("StateTest");
$admin->setPostalCode("888349");
$admin->setCountryCode("DK");
$admin->setEmail("administrator@ascio-test-domain.com");
$admin->setType("owner");


$tech =  new ascio\Contact();
$tech->setFirstName("John");
$tech->setLastName("Doe");
$tech->setOrgName("Ascio");
$tech->setAddress1("Address1Test");
$tech->setCity("CityTest");
$tech->setState("StateTest");
$tech->setPostalCode("888349");
$tech->setCountryCode("DK");
$tech->setEmail("administrator@ascio-test-domain.com");
$tech->setType("owner");


$billing =  new ascio\Contact();
$billing->setFirstName("John");
$billing->setLastName("Doe");
$billing->setOrgName("Ascio");
$billing->setAddress1("Address1Test");
$billing->setCity("CityTest");
$billing->setState("StateTest");
$billing->setPostalCode("888349");
$billing->setCountryCode("DK");
$billing->setEmail("administrator@ascio-test-domain.com");
$billing->setType("owner");


$reseller =  new ascio\Contact();
$reseller->setFirstName("John");
$reseller->setLastName("Doe");
$reseller->setOrgName("Ascio");
$reseller->setAddress1("Address1Test");
$reseller->setCity("CityTest");
$reseller->setState("StateTest");
$reseller->setPostalCode("888349");
$reseller->setCountryCode("DK");
$reseller->setEmail("administrator@ascio-test-domain.com");
$reseller->setType("owner");


$defensive =  new ascio\Defensive();
$defensive->setHandle("JD123");
$defensive->setName("John Doe");
$defensive->setMarkHandle("MarkHandleTest");
$defensive->setAuthInfo("X4FF!zu");
$defensive->setEncoding("EncodingTest");
$defensive->setOwner($owner);
$defensive->setAdmin($admin);
$defensive->setTech($tech);
$defensive->setBilling($billing);
$defensive->setReseller($reseller);
$defensive->setObjectComment("Example Object Comment");