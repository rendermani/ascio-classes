<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$ownerExtensions =  new ascio\Extensions(array($keyValue));


$owner =  new ascio\Registrant();
$owner->setFirstName("John");
$owner->setLastName("Doe");
$owner->setAddress1("Address1Test");
$owner->setCity("CityTest");
$owner->setPostalCode("888349");
$owner->setCountryCode("DK");
$owner->setEmail("administrator@ascio-test-domain.com");
$owner->setExtensions($ownerExtensions);


$adminExtensions =  new ascio\Extensions(array(
new ascio\KeyValue("Title", "Mrs.")
)
);


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
$admin->setExtensions($adminExtensions);


$techExtensions =  new ascio\Extensions(array(
new ascio\KeyValue("Title", "Mrs.")
)
);


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
$tech->setExtensions($techExtensions);


$sslCertificate =  new ascio\SslCertificate();
$sslCertificate->setHandle("JD123");
$sslCertificate->setCommonName("ascio-test-domain.com");
$sslCertificate->setProductCode("positivessl");
$sslCertificate->setWebServerType(ascio\WebServerType::ApacheSsl);
$sslCertificate->setApproverEmail("administrator@ascio-test-domain.com");
$sslCertificate->setCSR("-----BEGIN CERTIFICATE REQUEST-----MIIC2jCCAcICAQAwgZQxCzAJBgNVBAYTAkRFMRMwEQYDVQQIDApTb21lLVN0YXRlMQ8wDQYDVQQHDAZNdW5pY2gxEzARBgNVBAoMClRlc3RDb21hbnkxHjAcBgNVBAMMFWFzY2lvLXRlc3QtZG9tYWluLmNvbTEqMCgGCSqGSIb3DQEJARYbYWRtaW5AYXNjaW8tdGVzdC1kb21haW4uY29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwQ9AgF9B381tELA3BsKkIwu4Ddg0hOSfyrtBnm895ELPYG4YcPYXmauTxPu0oD6WhudQh2tbnN/QTRsZpdVgahS6uz7065wUC6IrvlcuaCx+e08vp/1VOIUrKfyrxkZ1mjrv4FwQ38y+ITejL46JBbKbhqbeovQymA/DmHmKUylNY3eud6w/Dp+QOoa1jIZRdHv5ie+ranOx9aYl0WeuzrIOeIVI7UKVF9d1o5r2h60wThLPzky9hux5uisGYZsWjFKOJUFZxkX4riResOWmkFy9KUV82MLuScrSJ4cVfVPmhN3tEpOtYhkJVkS0PvR7LCdL4rOF0pqzL71m2ZoMdQIDAQABoAAwDQYJKoZIhvcNAQELBQADggEBAHcDTCtBQmGcIarD4NFmKt+Tw3l2p+tGRA8OiT7dSTvJ1TavZYdcobFKkBhp/3T9ko4wncBChp97YWNWtQT+hoIrOh85QIMHW14JeVFk8AiptI5pI+DPHnSwSq4XANwwrUI/3zAeRtV7bQmP9upebZ3POJ9Bl9oarge8J2SJ6yM5Dizq9wmGgQlhEG9HuuvJHFGjci86m8yqbqlS8JaIvO2dA4OpEM3cCcu7jY13RYN4DT06VAx2okMJmAyxvG9eu45MIB/NzeV4SrqsTNqCkrXKiC9/rAzhl7eP3XDRI6XZFRq7qmIAQoZJqWSyl1f4cq+rbLIJ9xE+yII+qt/CVbc=-----END CERTIFICATE REQUEST-----");
$sslCertificate->setOwner($owner);
$sslCertificate->setAdmin($admin);
$sslCertificate->setTech($tech);
$sslCertificate->setSanNames(array("m.ascio-test-domain.com"));
$sslCertificate->setObjectComment("Example Object Comment");
$sslCertificate->setValidationType(ascio\SslDomainValidationType::Dns);