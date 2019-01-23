<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$markOrderDocument =  new ascio\MarkOrderDocument();
$markOrderDocument->setFileName("anything.jpg");
$markOrderDocument->setContent(base64_encode(123));
$markOrderDocument->setDocType(ascio\MarkOrderDocType::TrademarkAssigneeDeclaration);