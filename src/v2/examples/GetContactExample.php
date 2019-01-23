<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function getContactExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));

	try {
		 $response = $ascioClient->GetContact(new ascio\GetContact($sessionId, $contactHandle));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getGetContactResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
getContactExample();