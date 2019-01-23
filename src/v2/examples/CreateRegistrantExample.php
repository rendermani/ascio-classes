<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function createRegistrantExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$registrant =  new ascio\Registrant();
	$registrant->setName("John Doe");
	$registrant->setAddress1("Address1Test");
	$registrant->setCity("CityTest");
	$registrant->setPostalCode("888349");
	$registrant->setCountryCode("DK");
	$registrant->setEmail("administrator@ascio-test-domain.com");
	$registrant->setPhone("+45.123456789");

	try {
		 $response = $ascioClient->CreateRegistrant(new ascio\CreateRegistrant($sessionId, $registrant));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getCreateRegistrantResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
createRegistrantExample();