<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function createApprovalDocumentationExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$approvalDocumentation =  new ascio\ApprovalDocumentation();

	try {
		 $response = $ascioClient->CreateApprovalDocumentation(new ascio\CreateApprovalDocumentation($sessionId, $approvalDocumentation));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getCreateApprovalDocumentationResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
createApprovalDocumentationExample();