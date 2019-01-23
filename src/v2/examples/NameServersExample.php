<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$nameServer1 =  new ascio\NameServer();
$nameServer1->setHostName("ns1.ascio.net");


$nameServer2 =  new ascio\NameServer();
$nameServer2->setHostName("ns2.ascio.net");


$nameServers =  new ascio\NameServers();
$nameServers->setNameServer1($nameServer1);
$nameServers->setNameServer2($nameServer2);