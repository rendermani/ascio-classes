<?php

use ascio\lib\Ascio;
use ascio\dns\CreateZone;
use ascio\dns\ArrayOfRecord;
use ascio\dns\CNAME;
use ascio\lib\AscioEnvironment;
use ascio\lib\AscioException;
use ascio\dns\CreateRecord;
use ascio\dns\DeleteZone;
require_once("../vendor/autoload.php");

Ascio::setEnvironment(AscioEnvironment::Live);
Ascio::setConfigFile("/Users/ml/ownCloud/Keys/ascio/ascio.json");
$client = Ascio::getClientDns();

// create zone and record

try {
    echo "delete \n";
    $result = $client->DeleteZone(new DeleteZone("webrender4.uk"));
} catch (AscioException $e) {
}
try {
    echo "delete \n";
    $result = $client->DeleteZone(new DeleteZone("webrender3.uk"));
} catch (AscioException $e) {
}
try {
    echo "delete \n";
    $result = $client->DeleteZone(new DeleteZone("webrender2.uk"));
} catch (AscioException $e) {
}


$record = new CNAME();
$record->setSource("testmeee.webrender2.uk");
$record->setTarget("webrender.de");
$records = new ArrayOfRecord();
$records->setRecord([$record]);
$createZone = new CreateZone("webrender2.uk","webrender",$records);

try {
    echo "Create Zone and Record \n";
    $result = $client->CreateZone($createZone);
    echo "Create Zone and Record OK\n";
} catch (AscioException $e) {
    echo ($e->getResult()->getValues())[0]."\n";;
}

$records2 = new ArrayOfRecord();
$records2->setRecord([]);
$createZone = new CreateZone("webrender3.uk","webrender",$records2);

// create zone

try {
    echo "Create Zone \n";
    $result = $client->CreateZone($createZone);
    echo "Create Zone OK\n";
} catch (AscioException $e) {
    echo ($e->getResult()->getValues())[0]."\n";;
}
// create record

try {
    echo "Create Record \n";
    $record2 = new CNAME();
    $record2->setSource("testmeee.webrender4.uk");
    $record2->setTarget("webrender.de");
    $result = $client->CreateRecord(new CreateRecord("webrender4.uk",$record2));
    echo "Create Record OK\n";
} catch (AscioException $e) {
    echo ($e->getResult()->getValues())[0]."\n";
}



