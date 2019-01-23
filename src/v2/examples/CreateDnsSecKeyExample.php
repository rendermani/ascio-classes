<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function createDnsSecKeyExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$dnsSecKey =  new ascio\DnsSecKey();
	$dnsSecKey->setDigestAlgorithm("RSA-SHA256");
	$dnsSecKey->setDigestType("SHA-256");
	$dnsSecKey->setDigest("846E5ED4AB6788032B89393619752F662CF2B7B2046A8EC0804DF88F1469AC1E");
	$dnsSecKey->setKeyTag("2224");

	try {
		 $response = $ascioClient->CreateDnsSecKey(new ascio\CreateDnsSecKey($sessionId, $dnsSecKey));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getCreateDnsSecKeyResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
createDnsSecKeyExample();