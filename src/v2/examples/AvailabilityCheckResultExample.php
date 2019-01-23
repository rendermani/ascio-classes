<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$availabilityCheckResult =  new ascio\AvailabilityCheckResult();
$availabilityCheckResult->setDomainName("ascio-test-domain".microtime().".com");
$availabilityCheckResult->setQuality(ascio\QualityType::Fast);
$availabilityCheckResult->setStatusCode(1);
$availabilityCheckResult->setStatusMessage("StatusMessageTest");