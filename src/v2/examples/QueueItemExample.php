<?php
namespace ascio\v2\examples;
require("../service/autoload.php");
require("../../lib/AscioConfig.php");
use ascio\v2 as ascio;



$attachment =  new ascio\Attachment();
$attachment->setData("DataTest");
$attachment->setFileName("anything.jpg");


$attachments = array($attachment);



$callbackStatus =  new ascio\CallbackStatus();
$callbackStatus->setMessage("MessageTest");


$statusList = array($callbackStatus);



$queueItem =  new ascio\QueueItem();
$queueItem->setAttachments($attachments);
$queueItem->setDomainHandle("DomainHandleTest");
$queueItem->setDomainName("ascio-test-domain".microtime().".com");
$queueItem->setMsg("MsgTest");
$queueItem->setMsgId(1);
$queueItem->setMsgType(ascio\MessageType::Message_to_Partner);
$queueItem->setOrderStatus(ascio\OrderStatusType::NotSet);
$queueItem->setStatusList($statusList);