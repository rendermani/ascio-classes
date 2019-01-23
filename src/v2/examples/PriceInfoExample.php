<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$price =  new ascio\Price();
$price->setOrderType(ascio\OrderType::NotSet);
$price->setPeriod(1);
$price->setPrice("PriceTest");


$prices = array($price);



$priceInfo =  new ascio\PriceInfo();
$priceInfo->setDomainName("ascio-test-domain".microtime().".com");
$priceInfo->setDomainType("DomainTypeTest");
$priceInfo->setCurrency("CurrencyTest");
$priceInfo->setPrices($prices);