<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$extensions =  new ascio\Extensions(array($extension));


$privacyProxy =  new ascio\PrivacyProxy();
$privacyProxy->setType(ascio\PrivacyProxyEnumType::None);
$privacyProxy->setPrivacyAdmin(false);
$privacyProxy->setPrivacyTech(false);
$privacyProxy->setPrivacyBilling(false);
$privacyProxy->setExtensions($extensions);