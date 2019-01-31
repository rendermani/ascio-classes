<?php
require_once(__DIR__."/../vendor/autoload.php");

// these classes are only needed for development. 
// when using with composer, only the autoload.php is needed. 

$d = dir(__DIR__."/v2/service");
while (false !== ($entry = $d->read())) {
    if(strpos($entry,".")!==0) {
        require_once(__DIR__."/v2/service/".$entry);
    }    
}
require_once(__DIR__."/lib/Ascio.php");
require_once(__DIR__."/lib/v2/Domain.php");
require_once(__DIR__."/lib/v2/Order.php");
require_once(__DIR__."/lib/Tools.php");
require_once(__DIR__."/lib/Actions.php");

// end development includes

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Order;
use ascio\lib\v2\Domain;
use ascio\lib\Actions;
use ascio\lib\Tools;
use ascio\lib\AscioException;

class MyActions extends Actions {
    public static function Completed(Order $order)
    {
        parent::Completed($order);
        Tools::debug("My Completed");
    }
    public static function Failed(Order $order)
    {
        parent::Failed($order);
        Tools::debug("My Failed");
    }
}


Ascio::setEnvironment(AscioEnvironment::Testing);
Ascio::setConfigFile(getenv()["HOMEPATH"]."/keys/ascio.json");

try {
    $client = Ascio::getClientV2();
    $domain = new Domain();
    $domain->setDomainName("123anfrage.de");
    $order = new Order(v2\OrderType::Unexpire_Domain);
    $order->setActions("MyActions");
    $order->setDomain($domain);
    $order->create();
    $order->poll();

    $order = new Order(v2\OrderType::Expire_Domain);
    $order->setActions("MyActions");
    $order->setDomain($domain);
    $order->create();
    $order->poll();

    $domain = $order->getDomain()->get();
} catch (AscioException $e) {
    echo $e->debug();
}


