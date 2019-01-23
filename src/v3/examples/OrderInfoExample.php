<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$sslCertificate =  new ascio\SslCertificate();


$orderRequest =  new ascio\SslCertificateOrderRequest();
$orderRequest->setType(ascio\OrderType::Register);
$orderRequest->setPeriod(1);
$orderRequest->setTransactionComment("TransactionCommentTest");
$orderRequest->setComments("CommentsTest");
$orderRequest->setDocumentation("DocumentationTest");
$orderRequest->setOptions("OptionsTest");
$orderRequest->setSslCertificate($sslCertificate);


$orderInfo =  new ascio\OrderInfo();
$orderInfo->setOrderId("TEST123456");
$orderInfo->setCreated(new \DateTime());
$orderInfo->setOrderRequest($orderRequest);