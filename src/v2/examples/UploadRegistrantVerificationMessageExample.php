<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function uploadRegistrantVerificationMessageExample() {
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


	$messages = array($message);



	$details =  new ascio\RegistrantVerificationDetails();
	$details->setVerifiedBy("1.1.1.1");
	$details->setVerificationDate("VerificationDateTest");
	$details->setMessages($messages);

	try {
		 $response = $ascioClient->UploadRegistrantVerificationMessage(new ascio\UploadRegistrantVerificationMessage($sessionId, $value, $details));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getUploadRegistrantVerificationMessageResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
uploadRegistrantVerificationMessageExample();