<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;
use ascio\lib as lib;
function uploadMessageExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$credentials = array("Account"=>$env->getAccount(), "Password" => $env->getPassword());
	$header = new \SoapHeader("http://www.ascio.com/2013/02","SecurityHeaderDetails", $credentials, false);
	$ascioClient	 = new ascio\AscioService(array("trace" => true),$env->getWsdl("v3"));
	$ascioClient->__setSoapHeaders($header);


	$attachment =  new ascio\Attachment();
	$attachment->setFileName("anything.jpg");
	$attachment->setContent(base64_encode(123));


	$attachments = array($attachment);



	$message =  new ascio\Message();
	$message->setAttachments($attachments);
	$message->setBody("BodyTest");
	$message->setCreated(new \DateTime());
	$message->setFromAddress("administrator@ascio-test-domain.com");
	$message->setSubject("base64-encoded or 7 Bit ASCII");
	$message->setToAddress("ToAddressTest");
	$message->setType(ascio\MessageType::OrderMail);


	$request =  new ascio\UploadMessageRequest();
	$request->setOrderId("TEST123456");
	$request->setMessage($message);

	try {
		 $response = $ascioClient->UploadMessage(new ascio\UploadMessage($request));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->UploadMessageResult;
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getResultMessage()."\n";  
	return $result;
}
uploadMessageExample();