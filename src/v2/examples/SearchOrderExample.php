<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function searchOrderExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$pageInfo =  new ascio\PagingInfo();
	$pageInfo->setPageIndex(1);
	$pageInfo->setPageSize(1);


	$orderRequest =  new ascio\SearchOrderRequest();
	$orderRequest->setOrderTypes(array(OrderType.Register_Domain));
	$orderRequest->setOrderStatusTypes(array(OrderStatusType.Validated));
	$orderRequest->setFromDate("FromDateTest");
	$orderRequest->setToDate("ToDateTest");
	$orderRequest->setDomainName("ascio-test-domain".microtime().".com");
	$orderRequest->setTransactionComment("TransactionCommentTest");
	$orderRequest->setComments("CommentsTest");
	$orderRequest->setIncludeDomainDetails(true);
	$orderRequest->setPageInfo($pageInfo);
	$orderRequest->setOrderSort(ascio\SearchOrderSortType::CreDateAsc);

	try {
		 $response = $ascioClient->SearchOrder(new ascio\SearchOrder($sessionId, $orderRequest));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->getSearchOrderResult();
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getMessage()."\n";  
	return $result;
}
searchOrderExample();