<?php
require_once(__DIR__."/../vendor/autoload.php");

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\v2\Order;
use ascio\v2\OrderType;
use ascio\lib\v2\Domain;
use ascio\lib\Actions;
use ascio\lib\Tools;
use ascio\lib\AscioException;
use ascio\lib\LockType;

class AfterTransfer extends Actions {
    public static function Completed(Order $order)
    {
        parent::Completed($order);
        $domainName = $order->getDomain()->getDomainName();
        $domain = new Domain();
        $domain->get($domainName);
        $domain->db->write();
    }
}
class AfterLock extends Actions {
    public static function Completed(Order $order)
    {
        parent::Completed($order);
        
        setPartner($client,"fbits");

        $order = new Order(OrderType::Transfer_Domain);
        $order->setDomain($domain);
        $order->setActions("AfterTransfer");
        $order->create();
    }
}

function setPartner($client,$partner) {
    $header = new SoapHeader('http://www.ascio.com/2007/01','ImpersonationDetails', array('TransactionAccount'=>$partner), false);
    $client->__setSoapHeaders($header);
}

$client = Ascio::getClientV2();
setPartner($client,"mnet");

$file = file_get_contents("import/domains.txt"); 

foreach(explode("\n",$file) as $key => $domainName)  {
    
    setPartner($client,"mnet");
    
    $domain = new Domain();
    $domain->get($domainName);
    $domain->db->write();
    $domain->setDeleteLock("Unlock");
    $domain->setUpdateLock("Unlock");
    $domain->setTransferLock("Unlock");
    $domain->changeLocks("AfterLock");
}



