<?php
require_once(__DIR__."/../vendor/autoload.php");
use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Order;
use ascio\lib\v2\Domain;
use ascio\lib\Actions;
use ascio\lib\Tools;
use ascio\lib\AscioException;
use ascio\v2\AvailabilityCheck;
use ascio\v2\QualityType;
use ascio\v2\LogOut;
use ascio\v2\Whois;

Ascio::setEnvironment(AscioEnvironment::Live);
Ascio::setConfigFile("/Users/ml/ownCloud/Keys/ascio/ascio.json");

$client = Ascio::getClientV2();
$result = $client->AvailabilityCheck(new AvailabilityCheck(0,["upnode"],["com","de","net"],QualityType::Smart));
var_dump($result->getResults()->getAvailabilityCheckResult());
$client->logOut(new LogOut(0));

$result = $client->Whois(new Whois(0,"hostpoint.ch"));
var_dump($result);