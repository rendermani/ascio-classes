<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function createSupportOrderExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$attachment =  new ascio\Attachment();
	$attachment->setData("DataTest");
	$attachment->setFileName("anything.jpg");


	$attachments = array($attachment);


	try {
		 $response = $ascioClient->CreateSupportOrder(new ascio\CreateSupportOrder($sessionId, $subject, $body, $attachments));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getCreateSupportOrderResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
createSupportOrderExample();