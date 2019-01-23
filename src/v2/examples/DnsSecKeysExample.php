<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$dnsSecKey1 =  new ascio\DnsSecKey();
$dnsSecKey1->setDigestAlgorithm("RSA-SHA256");
$dnsSecKey1->setDigestType("SHA-256");
$dnsSecKey1->setDigest("846E5ED4AB6788032B89393619752F662CF2B7B2046A8EC0804DF88F1469AC1E");
$dnsSecKey1->setKeyTag("2224");


$dnsSecKeys =  new ascio\DnsSecKeys();
$dnsSecKeys->setDnsSecKey1($dnsSecKey1);