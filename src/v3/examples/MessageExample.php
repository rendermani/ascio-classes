<?php
namespace ascio\v3\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v3 as ascio;



$attachment =  new ascio\Attachment();
$attachment->setFileName("anything.jpg");
$attachment->setContent(base64_encode(123));


$attachments = array($attachment);



$message =  new ascio\Message();
$message->setAttachments($attachments);
$message->setBody("BodyTest");
$message->setCreated(new \DateTime());
$message->setFromAddress("administrator@ascio-test-domain.com");
$message->setSubject("base64-encoded or 7 Bit ASCII");
$message->setToAddress("ToAddressTest");
$message->setType(ascio\MessageType::OrderMail);