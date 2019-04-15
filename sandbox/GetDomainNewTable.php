<?php
require_once(__DIR__."/../vendor/autoload.php");

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Domain;
use ascio\lib\AscioException;
use Illuminate\Database\Capsule\Manager as Capsule;


$path = "/Users/ml/ownCloud/Keys/ascio/ascio.json";
Ascio::setEnvironment(AscioEnvironment::Testing);
Ascio::setConfigFile($path);

try {
    Capsule::Schema()->drop("v2_Contact");
    Capsule::Schema()->drop("v2_Registrant");
    Capsule::Schema()->drop("v2_NameServers");
    Capsule::Schema()->drop("v2_NameServer");
    Capsule::Schema()->drop("v2_Domain");
} catch(Exception $e) {
    echo "already deleted\n";
}

$client = Ascio::getClientV2();

$domain = new Domain();
$domain->get("adara-loves-manuel.com");


