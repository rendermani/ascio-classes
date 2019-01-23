<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function contact_UpdateExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$adminContact =  new ascio\Contact();
	$adminContact->setFirstName("John");
	$adminContact->setLastName("Doe");
	$adminContact->setAddress1("Address1Test");
	$adminContact->setPostalCode("888349");
	$adminContact->setCity("CityTest");
	$adminContact->setCountryCode("DK");
	$adminContact->setEmail($config->getEmail());
	$adminContact->setPhone("+45.123456789");
	$adminContact->setType("owner");


	$domain =  new ascio\Domain();
	$domain->setDomainName($env->getProperties()->getProperty("DomainName"));
	$domain->setAdminContact($adminContact);


	$order =  new ascio\Order();
	$order->setType(ascio\OrderType::Contact_Update);
	$order->setDomain($domain);

	echo "start validate\n";
	$validateOrder = new  ascio\ValidateOrder($sessionId, $order);
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
			$createOrderResponse = $ascioClient->CreateOrder(new ascio\CreateOrder($sessionId, $order));
		} catch (\Exception $e) {
			echo ("[".$e->faultcode . "] ". $e->faultstring);
			return;
		}
		echo "Create Order: ".$createOrderResponse->CreateOrderResult->getResultCode() . " " . $createOrderResponse->CreateOrderResult->getResultMessage() . "\r\n";
		if ($createOrderResponse->CreateOrderResult->getResultCode() == 200) {
			echo "OrderId : " . $createOrderResponse->CreateOrderResult->getOrderInfo()->getOrderId() . "\r\n";
			echo "Order Status : " . $createOrderResponse->CreateOrderResult->getOrderInfo()->getStatus() . "\r\n";
		} else {
			echo ($response->CreateOrderResult->getMessage()."\n");
			foreach($createOrderResponse->CreateOrderResult->getErrors() as $error) {
				echo $error."\n";
				return $response;
			}
		}
		return $createOrderResponse;
	} else {
		echo ($response->getValidateOrderResult()->getMessage()."\n");
		if ($response->getValidateOrderResult()->getErrors()) {
			foreach($response->getValidateOrderResult()->getErrors()->getString() as $error) {
				 echo $error."\n";
			}
		}
		return $response;
	}
}
contact_UpdateExample();