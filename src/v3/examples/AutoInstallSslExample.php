<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$autoInstallSsl =  new ascio\AutoInstallSsl();
$autoInstallSsl->setHandle("JD123");
$autoInstallSsl->setCommonName("ascio-test-domain.com");
$autoInstallSsl->setProductCode("positivessl");
$autoInstallSsl->setEmail("administrator@ascio-test-domain.com");
$autoInstallSsl->setSanCount(1);
$autoInstallSsl->setObjectComment("Example Object Comment");