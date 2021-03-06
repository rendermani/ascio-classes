<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function logInExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$session =  new ascio\Session();
	$session->setAccount("AccountTest");
	$session->setPassword("PasswordTest");

	try {
		 $response = $ascioClient->LogIn(new ascio\LogIn($session));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getLogInResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
logInExample();