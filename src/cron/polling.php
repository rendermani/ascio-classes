<?php
require_once(__DIR__."/../../vendor/autoload.php");
require_once(__DIR__."/../lib/Callback.php");
require_once(__DIR__."/../lib/Ascio.php");

use ascio\lib\v2\Callback;
use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;

Ascio::setEnvironment(AscioEnvironment::Live);
Ascio::setConfigFile("/Users/ml/ownCloud/Keys/ascio/ascio.json");

$callback = new Callback();
$callback->pollCron();