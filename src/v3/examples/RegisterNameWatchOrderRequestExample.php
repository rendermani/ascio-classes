<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;
use ascio\lib as lib;
function registerNameWatchOrderRequestExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$credentials = array("Account"=>$env->getAccount(), "Password" => $env->getPassword());
	$header = new \SoapHeader("http://www.ascio.com/2013/02","SecurityHeaderDetails", $credentials, false);
	$ascioClient	 = new ascio\AscioService(array("trace" => true),$env->getWsdl("v3"));
	$ascioClient->__setSoapHeaders($header);


	$nameWatch =  new ascio\NameWatch();


	$request =  new ascio\NameWatchOrderRequest();
	$request->setType(ascio\OrderType::Register);
	$request->setPeriod(1);
	$request->setTransactionComment("TransactionCommentTest");
	$request->setComments("CommentsTest");
	$request->setDocumentation("DocumentationTest");
	$request->setOptions("OptionsTest");
	$request->setNameWatch($nameWatch);

	echo "start validate\n";
	$validateOrder = new  ascio\ValidateOrder($request);
	try {
		$response = $ascioClient->ValidateOrder($validateOrder);
	} catch (\Exception $e) {
		echo ("[".$e->faultcode . "] ". $e->faultstring);
		return;
	}
	echo "end validate\n";
	
	if ($response->getValidateOrderResult()->getResultCode() == 200) {
		echo "Validation: OK\r\n";
		try {
			$createOrderResponse = $ascioClient->CreateOrder(new ascio\CreateOrder($request));
		} catch (\Exception $e) {
			echo ("[".$e->faultcode . "] ". $e->faultstring);
			return;
		}
		echo "Create Order: ".$createOrderResponse->CreateOrderResult->getResultCode() . " " . $createOrderResponse->CreateOrderResult->getResultMessage() . "\r\n";
		if ($createOrderResponse->CreateOrderResult->getResultCode() == 200) {
			echo "OrderId : " . $createOrderResponse->CreateOrderResult->getOrderInfo()->getOrderId() . "\r\n";
			echo "Order Status : " . $createOrderResponse->CreateOrderResult->getOrderInfo()->getStatus() . "\r\n";
		} else {
			echo ($response->CreateOrderResult->getResultMessage()."\n");
			foreach($createOrderResponse->CreateOrderResult->getErrors() as $error) {
				echo $error."\n";
				return $response;
			}
		}
		return $createOrderResponse;
	} else {
		echo ($response->getValidateOrderResult()->getResultMessage()."\n");
		if ($response->getValidateOrderResult()->getErrors()) {
			foreach($response->getValidateOrderResult()->getErrors()->getString() as $error) {
				 echo $error."\n";
			}
		}
		return $response;
	}
}
registerNameWatchOrderRequestExample();