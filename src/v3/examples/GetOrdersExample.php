<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;
use ascio\lib as lib;
function getOrdersExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$credentials = array("Account"=>$env->getAccount(), "Password" => $env->getPassword());
	$header = new \SoapHeader("http://www.ascio.com/2013/02","SecurityHeaderDetails", $credentials, false);
	$ascioClient	 = new ascio\AscioService(array("trace" => true),$env->getWsdl("v3"));
	$ascioClient->__setSoapHeaders($header);


	$pageInfo =  new ascio\PagingInfo();
	$pageInfo->setPageIndex(1);
	$pageInfo->setPageSize(1);


	$request =  new ascio\GetOrdersRequest();
	$request->setTransactionComment("TransactionCommentTest");
	$request->setComments("CommentsTest");
	$request->setObjectName("ObjectNameTest");
	$request->setFromDate(new \DateTime());
	$request->setToDate(new \DateTime());
	$request->setOrderStatusTypes(array(OrderStatusType.Validated));
	$request->setOrderTypes(array(OrderType.Register));
	$request->setObjectTypes(array(ObjectType.SslCertificateType));
	$request->setOrderSort(ascio\SearchOrderSortType::CreatedAsc);
	$request->setPageInfo($pageInfo);

	try {
		 $response = $ascioClient->GetOrders(new ascio\GetOrders($request));
        } catch (\Exception $e) {
    		echo ("[".$e->faultcode . "] ". $e->faultstring);
	    	return;
        
        }
	$result = $response->GetOrdersResult;
	echo "Code: ".$result->getResultCode()."\n";
	echo "Message: ".$result->getResultMessage()."\n";  
	return $result;
}
getOrdersExample();