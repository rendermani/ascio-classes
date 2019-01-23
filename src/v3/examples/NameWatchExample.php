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


$nameWatch =  new ascio\NameWatch();
$nameWatch->setHandle("JD123");
$nameWatch->setName("John Doe");
$nameWatch->setNotificationFrequency(ascio\NotificationFrequencyType::Daily);
$nameWatch->setTier(1);
$nameWatch->setEmailNotification1("EmailNotification1Test");
$nameWatch->setEmailNotification2("EmailNotification2Test");
$nameWatch->setEmailNotification3("EmailNotification3Test");
$nameWatch->setEmailNotification4("EmailNotification4Test");
$nameWatch->setEmailNotification5("EmailNotification5Test");
$nameWatch->setOwner($owner);
$nameWatch->setReseller($reseller);
$nameWatch->setObjectComment("Example Object Comment");