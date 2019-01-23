<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;
use ascio\lib as lib;
function register_DomainExample() {
	$config = new lib\Config();
	$env = $config->get("testing"); //testing or live
	$sessionId = "12345";
	$ascioClient	 = new ascio\AscioServices(array("trace" => true),$env->getWsdl("v2"));


	$registrant =  new ascio\Registrant();
	$registrant->setName("John Doe");
	$registrant->setAddress1("Address1Test");
	$registrant->setCity("CityTest");
	$registrant->setPostalCode("888349");
	$registrant->setCountryCode("DK");
	$registrant->setEmail($config->getEmail());
	$registrant->setPhone("+45.123456789");


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


	$techContact =  new ascio\Contact();
	$techContact->setFirstName("John");
	$techContact->setLastName("Doe");
	$techContact->setAddress1("Address1Test");
	$techContact->setPostalCode("888349");
	$techContact->setCity("CityTest");
	$techContact->setCountryCode("DK");
	$techContact->setEmail($config->getEmail());
	$techContact->setPhone("+45.123456789");
	$techContact->setType("owner");


	$billingContact =  new ascio\Contact();
	$billingContact->setType("owner");


	$nameServer1 =  new ascio\NameServer();
	$nameServer1->setHostName("ns1.ascio.net");


	$nameServer2 =  new ascio\NameServer();
	$nameServer2->setHostName("ns2.ascio.net");


	$nameServers =  new ascio\NameServers();
	$nameServers->setNameServer1($nameServer1);
	$nameServers->setNameServer2($nameServer2);


	$domain =  new ascio\Domain();
	$domain->setDomainName("ascio-test-domain".microtime().".com");
	$domain->setRegistrant($registrant);
	$domain->setAdminContact($adminContact);
	$domain->setTechContact($techContact);
	$domain->setBillingContact($billingContact);
	$domain->setNameServers($nameServers);
	$domain->setDiscloseSocialData("true");


	$order =  new ascio\Order();
	$order->setType(ascio\OrderType::Register_Domain);
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
register_DomainExample();