<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$price =  new ascio\Price();
$price->setOrderType(ascio\OrderType::NotSet);
$price->setPeriod(1);
$price->setPrice("PriceTest");