<?php
require_once(__DIR__."/vendor/autoload.php");
header('Content-Type: application/json');

// these classes are only needed for development. 
// when using with composer, only the autoload.php is needed. 

$d = dir(__DIR__."/src/v2/service");
while (false !== ($entry = $d->read())) {
    if(strpos($entry,".")!==0) {
        require_once(__DIR__."/src/v2/service/".$entry);
    }    
}
require_once(__DIR__."/src/lib/Ascio.php");
require_once(__DIR__."/src/lib/v2/Domain.php");
require_once(__DIR__."/src/lib/v2/Order.php");
require_once(__DIR__."/src/lib/Tools.php");
require_once(__DIR__."/src/lib/Actions.php");

// end development includes

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
Ascio::setConfigFile($config);
Ascio::setEnvironment(AscioEnvironment::Testing);

try {
    $client = Ascio::getClientV2();
    $result = $client->AvailabilityInfo(new AvailabilityInfo(0,$_GET["domain"], QualityType::Live));
    $out = ["code" => $result->getAvailabilityInfoResult()->getResultCode()];
   
} catch (AscioException $e) {
    $out=["code" => 201];
}
echo json_encode($out);
