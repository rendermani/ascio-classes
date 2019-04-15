<?php
namespace ascio\workflows\custom;
use ascio\workflows\Workflow;
use ascio\lib\Ascio;
use ascio\lib\v2\Domain;
use ascio\lib\LockType;

class InternalTransfer extends Workflow {
    public function unlockUpdate() {
        $this->setPartner("cvkd148");
        $domain = $this->getDomain()->getApi();
        $this->setProperty("oldTransferLock",$domain->getTransferLock());
        $this->setProperty("oldDeleteLock",$domain->getDeleteLock());
        $this->setProperty("oldUpdateLock",$domain->getUpdateLock());
        $domain->setUpdateLock(false);
        return $domain->changeLocks();
    }
    public function unlockTransferDelete() {
        $this->setPartner("cvkd148");
        $domain = $this->getDomain();
        $domain->setTransferLock(false);
        $domain->setDeleteLock(false);
        return $domain->changeLocks();
    }
    public function transferDomain() {
        $this->setPartner("whmcsdemo");
        return $this->getDomain()->transfer();
    }
    public function relockDomain() {
        $this->setPartner("whmcsdemo");
        $domain = $this->getDomain();        
        $domain->setTransferLock($this->getProperty("oldTransferLock"));
        $domain->setDeleteLock($this->getProperty("oldDeleteLock"));
        $domain->setUpdateLock($this->getProperty("oldUpdateLock"));
        return $domain->changeLocks();
    }
}

