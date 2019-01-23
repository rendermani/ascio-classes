<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function createContactExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$contact =  new ascio\Contact();
	$contact->setFirstName("John");
	$contact->setLastName("Doe");
	$contact->setAddress1("Address1Test");
	$contact->setPostalCode("888349");
	$contact->setCity("CityTest");
	$contact->setCountryCode("DK");
	$contact->setEmail("administrator@ascio-test-domain.com");
	$contact->setPhone("+45.123456789");
	$contact->setType("owner");

	try {
		 $response = $ascioClient->CreateContact(new ascio\CreateContact($sessionId, $contact));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getCreateContactResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
createContactExample();