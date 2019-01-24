<?php
require_once("vendor/autoload.php");
use ascio\v3 as v3;
use ascio\v2 as v2;
use ascio\dns as dns; 
use ascio\lib as lib;
use ascio\lib\AscioException; 

use ascio\v2\PollMessage;
use ascio\v2\MessageType;

/**
 * Please place the config.json in the root of your project and edit it.
 */

$client = lib\Ascio::getClientV2("testing");
$pollMessage = new PollMessage(0,MessageType::Message_to_Partner);
try {   
    $result = $client->PollMessage($pollMessage);
    var_dump($result->getMsgCount());
} catch (AscioException $e) {
    echo $e->debugSoap();
}
