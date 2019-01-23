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


$adminContact =  new ascio\Contact();
$adminContact->setFirstName("John");
$adminContact->setLastName("Doe");
$adminContact->setAddress1("Address1Test");
$adminContact->setPostalCode("888349");
$adminContact->setCity("CityTest");
$adminContact->setCountryCode("DK");
$adminContact->setEmail("administrator@ascio-test-domain.com");
$adminContact->setPhone("+45.123456789");
$adminContact->setType("owner");


$techContact =  new ascio\Contact();
$techContact->setFirstName("John");
$techContact->setLastName("Doe");
$techContact->setAddress1("Address1Test");
$techContact->setPostalCode("888349");
$techContact->setCity("CityTest");
$techContact->setCountryCode("DK");
$techContact->setEmail("administrator@ascio-test-domain.com");
$techContact->setPhone("+45.123456789");
$techContact->setType("owner");


$billingContact =  new ascio\Contact();


$resellerContact =  new ascio\Contact();


$nameServer1 =  new ascio\NameServer();
$nameServer1->setHostName("ns1.ascio.net");


$nameServer2 =  new ascio\NameServer();
$nameServer2->setHostName("ns2.ascio.net");


$nameServers =  new ascio\NameServers();
$nameServers->setNameServer1($nameServer1);
$nameServers->setNameServer2($nameServer2);


$trademark =  new ascio\TradeMark();
$trademark->setName("John Doe");
$trademark->setCountry("DK");
$trademark->setDate("DateTest");
$trademark->setNumber("NumberTest");
$trademark->setType("owner");
$trademark->setContact("ContactTest");
$trademark->setContactLanguage("ContactLanguageTest");
$trademark->setDocumentationLanguage("DocumentationLanguageTest");
$trademark->setSecondContact("SecondContactTest");
$trademark->setThirdContact("ThirdContactTest");
$trademark->setRegDate("RegDateTest");


$dnsSecKey1 =  new ascio\DnsSecKey();
$dnsSecKey1->setDigestAlgorithm("RSA-SHA256");
$dnsSecKey1->setDigestType("SHA-256");
$dnsSecKey1->setDigest("846E5ED4AB6788032B89393619752F662CF2B7B2046A8EC0804DF88F1469AC1E");
$dnsSecKey1->setKeyTag("2224");


$dnsSecKeys =  new ascio\DnsSecKeys();
$dnsSecKeys->setDnsSecKey1($dnsSecKey1);


$extensions =  new ascio\Extensions(array($extension));


$privacyProxy =  new ascio\PrivacyProxy();
$privacyProxy->setType(ascio\PrivacyProxyEnumType::None);
$privacyProxy->setPrivacyAdmin(false);
$privacyProxy->setPrivacyTech(false);
$privacyProxy->setPrivacyBilling(false);
$privacyProxy->setExtensions($extensions);


$domain =  new ascio\Domain();
$domain->setDomainName("ascio-test-domain".microtime().".com");
$domain->setDomainHandle("DomainHandleTest");
$domain->setRegPeriod(1);
$domain->setRenewPeriod(1);
$domain->setAuthInfo("X4FF!zu");
$domain->setExpDate("ExpDateTest");
$domain->setEncodingType("EncodingTypeTest");
$domain->setDomainPurpose("DomainPurposeTest");
$domain->setComment("CommentTest");
$domain->setTransferLock("Unlock");
$domain->setDeleteLock("Unlock");
$domain->setUpdateLock("Unlock");
$domain->setQueueType("QueueTypeTest");
$domain->setRegistrant($registrant);
$domain->setAdminContact($adminContact);
$domain->setTechContact($techContact);
$domain->setBillingContact($billingContact);
$domain->setResellerContact($resellerContact);
$domain->setNameServers($nameServers);
$domain->setTrademark($trademark);
$domain->setDnsSecKeys($dnsSecKeys);
$domain->setPrivacyProxy($privacyProxy);
$domain->setDomainType("DomainTypeTest");
$domain->setDiscloseSocialData("true");