<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$dnsSecKey =  new ascio\DnsSecKey();
$dnsSecKey->setDigestAlgorithm("RSA-SHA256");
$dnsSecKey->setDigestType("SHA-256");
$dnsSecKey->setDigest("846E5ED4AB6788032B89393619752F662CF2B7B2046A8EC0804DF88F1469AC1E");
$dnsSecKey->setKeyTag("2224");