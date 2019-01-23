<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;
use ascio\lib as lib;
function uploadDocumentationExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$credentials = array("Account"=>$env->getAccount(), "Password" => $env->getPassword());
	$header = new \SoapHeader("http://www.ascio.com/2013/02","SecurityHeaderDetails", $credentials, false);
	$ascioClient	 = new ascio\AscioService(array("trace" => true),$env->getWsdl("v3"));
	$ascioClient->__setSoapHeaders($header);


	$attachment =  new ascio\Attachment();
	$attachment->setFileName("anything.jpg");
	$attachment->setContent(base64_encode(123));


	$documents = array($attachment);



	$request =  new ascio\UploadDocumentationRequest();
	$request->setOrderId("TEST123456");
	$request->setDocuments($documents);

	try {
		 $response = $ascioClient->UploadDocumentation(new ascio\UploadDocumentation($request));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->UploadDocumentationResult;
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getResultMessage()."\n";  
	return $result;
}
uploadDocumentationExample();