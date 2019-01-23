<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$attachment =  new ascio\Attachment();
$attachment->setData("DataTest");
$attachment->setFileName("anything.jpg");


$attachments = array($attachment);



$message =  new ascio\Message();
$message->setAttachments($attachments);
$message->setBody("BodyTest");
$message->setCreated("CreatedTest");
$message->setFromAddress("administrator@ascio-test-domain.com");
$message->setSubject("base64-encoded or 7 Bit ASCII");
$message->setToAddress("ToAddressTest");
$message->setType(ascio\MessageType::Message_to_Partner);