<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$autoInstallSslInfo =  new ascio\AutoInstallSslInfo();
$autoInstallSslInfo->setHandle("JD123");
$autoInstallSslInfo->setCreated(new \DateTime());
$autoInstallSslInfo->setCommonName("ascio-test-domain.com");
$autoInstallSslInfo->setProductCode("positivessl");
$autoInstallSslInfo->setEmail("administrator@ascio-test-domain.com");
$autoInstallSslInfo->setSanCount(1);
$autoInstallSslInfo->setToken("TokenTest");
$autoInstallSslInfo->setObjectComment("Example Object Comment");