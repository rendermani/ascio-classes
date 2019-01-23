<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function searchContactExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$clause =  new ascio\Clause();
	$clause->setAttribute("AttributeTest");
	$clause->setOperator(ascio\SearchOperatorType::Is);
	$clause->setValue("Mr.");


	$clauses = array($clause);



	$criteria =  new ascio\SearchCriteria();
	$criteria->setClauses($clauses);
	$criteria->setMode(ascio\SearchModeType::Strict);
	$criteria->setWithoutstates(array("WithoutstatesTest"));
	$criteria->setWithstates(array("WithstatesTest"));

	try {
		 $response = $ascioClient->SearchContact(new ascio\SearchContact($sessionId, $criteria));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getSearchContactResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
searchContactExample();