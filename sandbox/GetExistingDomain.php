<?php
require_once(__DIR__."/../vendor/autoload.php");

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Domain;
use ascio\lib\AscioException;

$path = "/Users/ml/ownCloud/Keys/ascio/ascio.json";
Ascio::setEnvironment(AscioEnvironment::Testing);
Ascio::setConfigFile($path);

$client = Ascio::getClientV2();

$domain = new Domain();
$domain->setDomainHandle("ADARALOV36431");
$domain->db->sync();

var_dump($domain);
//$domain->get("adara-loves-manuel.com");
