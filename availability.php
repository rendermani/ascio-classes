<?php
require_once(__DIR__."/vendor/autoload.php");
header('Content-Type: application/json');

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Order;
use ascio\lib\v2\Domain;
use ascio\lib\Actions;
use ascio\lib\Tools;
use ascio\lib\AscioException;
use ascio\v2\OrderType;
use ascio\v2\Registrant;
use ascio\v2\AvailabilityInfo;
use ascio\v2\QualityType;

$config = "/Users/ml/ownCloud/Keys/ascio/ascio.json";
Ascio::setEnvironment(AscioEnvironment::Testing);
Ascio::setConfigFile($config);

try {
    $client = Ascio::getClientV2();
    $result = $client->AvailabilityInfo(new AvailabilityInfo(0,$_GET["domain"], QualityType::Live));
    $out = ["code" => $result->getAvailabilityInfoResult()->getResultCode()];
   
} catch (AscioException $e) {
    $out=["code" => 201];
}
echo json_encode($out);
