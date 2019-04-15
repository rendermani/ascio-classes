<?php
namespace ascio\lib;
require_once(__DIR__."/vendor/autoload.php");

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Callback;
use ascio\v3\GetOrder;
use ascio\v3\GetOrderRequest;
use ascio\v2\AckMessage;


Ascio::setEnvironment(AscioEnvironment::Testing);
Ascio::setConfigFile("/Users/ml/ownCloud/Keys/ascio/ascio.json");


function poll() {
    $callback = new Callback();
    try {    
        $callback->pollCron();
    } catch (AscioException $e) {    
        $client = Ascio::getClientV3(); 
        $request =  new GetOrderRequest();
        $request->setOrderId($callback->getOrder()->getOrderId());
        $result = $client->GetOrder(new GetOrder($request));
        if($result->getOrderInfo()) {
            //TODO: Replace with V3 Polling
            Tools::debug("Skip SSL Certificate");
            $msgId = $callback->getQueueItem()->getMsgId();
            Ascio::getClientV2()->AckMessage(new AckMessage(0,$msgId));
            poll();
        }
    }
}

poll();
