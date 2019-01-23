<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function uploadMessageExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$attachment =  new ascio\Attachment();
	$attachment->setData("DataTest");
	$attachment->setFileName("anything.jpg");


	$attachments = array($attachment);



	$message =  new ascio\Message();
	$message->setAttachments($attachments);
	$message->setBody("BodyTest");
	$message->setCreated("CreatedTest");
	$message->setFromAddress("administrator@ascio-test-domain.com");
	$message->setSubject("base64-encoded or 7 Bit ASCII");
	$message->setToAddress("ToAddressTest");
	$message->setType(ascio\MessageType::Message_to_Partner);

	try {
		 $response = $ascioClient->UploadMessage(new ascio\UploadMessage($sessionId, $orderId, $message));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getUploadMessageResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
uploadMessageExample();