<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$clause =  new ascio\Clause();
$clause->setAttribute("AttributeTest");
$clause->setOperator(ascio\SearchOperatorType::Is);
$clause->setValue("Mr.");