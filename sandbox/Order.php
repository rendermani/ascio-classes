<?php
require_once(__DIR__."/../vendor/autoload.php");

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Order;
use ascio\lib\v2\Domain;
use ascio\lib\v2\NameServer;
use ascio\lib\v2\NameServers;
use ascio\lib\v2\Contact;
use ascio\lib\v2\Registrant;
use ascio\v2\OrderType;
use ascio\lib\Actions;
use ascio\lib\Tools;
use ascio\lib\AscioException;
use ascio\lib\LockType;
use Illuminate\Database\Capsule\Manager as Capsule;



$path = "/Users/ml/ownCloud/Keys/ascio/ascio.json";
Ascio::setEnvironment(AscioEnvironment::Testing);
Ascio::setConfigFile($path);

$client = Ascio::getClientV2();

$email = "manuellautenschlager@gmail.com";

$registrant =  new Registrant();
$registrant->setName("John Doe");
$registrant->setAddress1("Address1Test");
$registrant->setCity("CityTest");
$registrant->setPostalCode("888349");
$registrant->setCountryCode("DK");
$registrant->setEmail($email);
$registrant->setPhone("+45.123456789");

$adminContact =  new Contact();
$adminContact->setFirstName("John");
$adminContact->setLastName("Doe");
$adminContact->setAddress1("Address1Test");
$adminContact->setPostalCode("888349");
$adminContact->setCity("CityTest");
$adminContact->setCountryCode("DK");
$adminContact->setEmail($email);
$adminContact->setPhone("+45.123456789");
$adminContact->setType("owner");

$techContact =  new Contact();
$techContact->setFirstName("John");
$techContact->setLastName("Doe");
$techContact->setAddress1("Address1Test");
$techContact->setPostalCode("888349");
$techContact->setCity("CityTest");
$techContact->setCountryCode("DK");
$techContact->setEmail($email);
$techContact->setPhone("+45.123456789");
$techContact->setType("owner");

$billingContact =  new Contact();
$billingContact->setType("owner");

$nameServer1 =  new NameServer();
$nameServer1->setHostName("ns1.ascio.net");

$nameServer2 =  new NameServer();
$nameServer2->setHostName("ns2.ascio.net");

$nameServers =  new NameServers();
$nameServers->setNameServer1($nameServer1);
$nameServers->setNameServer2($nameServer2);

$domain =  new Domain();
$domain->setDomainName("phpfw-manuel.com");
$domain->setRegistrant($registrant);
$domain->setAdminContact($adminContact);
$domain->setTechContact($techContact);
$domain->setBillingContact($billingContact);
$domain->setNameServers($nameServers);
$domain->setDiscloseSocialData("true");

$domain->db->saveObject();
$domain->deleteTemporaryHandles();
var_dump($domain);