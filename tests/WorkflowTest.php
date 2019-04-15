
<?php
use PHPUnit\Framework\TestCase;
use ascio\lib\v2\Order;
use ascio\lib\TestLib;
use ascio\v2\OrderType;
use ascio\lib\v2\Domain;
use ascio\v2\OrderStatusType;
use ascio\lib\AscioException;
use ascio\lib\Tools;
use ascio\v2\LogOut;
use ascio\lib\Ascio;
use ascio\workflows\custom\InternalTransfer;
use PHPUnit\Framework\MockObject\Stub\Exception;
use ascio\model\common\WorkflowStepModel;
use ascio\workflows\WorkflowStep;
use ascio\lib\AscioOrderExceptionV2;

/**
 * WorkflowTest
 * @group Order
 */
class WorkflowTest extends TestCase
{
    
    const Domain = "testing356ml.de";
    public static function setUpBeforeClass() : void
    {
        global $lastOrderId;
        Testlib::clearTables();
        $domain = new Domain();
        $domain->get("again-manuel.com");        
        if($domain->getUpdateLock()=="Unlock") {
            $domain->setUpdateLock(true);
            try {
                $result =  $domain->changeLocks();      
                $lastOrderId = $result->getOrder()->getOrderId();        
            } catch (AscioOrderExceptionV2 $e) {
                echo $e->formatErrors();
            }
            
        }        
        
    }
    public static function tearDownAfterClass() : void {
        Ascio::getClientV2()->LogOut(new LogOut(0));
    }
    public function testCreate()
    {
        $domain = new Domain();
        $domain->setDomainName($this::Domain);
        $transfer = new InternalTransfer($domain,"testwf","Testing Workflow");      
        $transfer->init();
        $count = $transfer
        ->getDb()
        ->where("Id",$transfer->getId())
        ->count();
        $this->assertEquals(1, $count,"There should be 1 Jobs in the Database");
        
        $count = WorkflowStepModel::query()
        ->where("Workflow",$transfer->getId())
        ->count();
        $this->assertEquals(4, $count,"There should be 4 Jobs in the Database");
    }
    public function testGetDb() {
        $transfer = $this->getWorkflow($this::Domain);
        $this->assertEquals("testwf",$transfer->getName(),"The Name should be 'testwf'");  
        $this->assertEquals("ascio\workflows\custom\InternalTransfer",$transfer->getClass(),"The Class should be ascio\workflows\custom\InternalTransfer ");  
        $this->assertEquals("Testing Workflow",$transfer->getDescription(),"The Description should be 'Testing Workflow'");  
        $this->assertEquals(OrderStatusType::NotSet,$transfer->getStatus(),"The Status should be NotSet");  
    }
    public function testGetDbSteps() {
        $transfer = $this->getWorkflow($this::Domain);
        /**
         * @var WorkflowStep $transferStep
         */
        $step = $transfer->getSteps()[2];
       
        // steps
        $this->assertEquals("transferDomain",$step->getName(),"The Name should be TransferDomain");  
        $this->assertEquals(OrderStatusType::NotSet,$step->getStatus(),"The Status should be NotSet");  
        $this->assertEquals("1",$step->getWorkflowId(),"The workflow must be linked to ID 1");  
        $this->assertCount(4,$transfer->getSteps(),"There must be 4 steps in InternalTransfer");
    }
    public function testNextStep() {
        $transfer = $this->getWorkflow($this::Domain);
        $step = $transfer->next();
        $this->assertEquals("unlockUpdate",$step->getName(),"The Name should be UnlockDomain");
        $this->assertEquals("1",$step->getWorkflowId(),"The workflow must be linked to ID 1");  
        $this->assertEquals(OrderStatusType::NotSet,$step->getStatus(),"The Status should be NotSet");
        //var_dump($step);   
    }
    public function testNextStepByOrderId() {        
        $transfer = $this->getWorkflow($this::Domain);
        $step = new WorkflowStep($transfer);
        $step->getByOrderId(12345);       
        $this->assertEquals("unlockUpdate",$step->getName(),"The Name should be UnlockDomain");
        $this->assertEquals("1",$step->getWorkflowId(),"The workflow must be linked to ID 1");  
        $this->assertEquals(OrderStatusType::NotSet,$step->getStatus(),"The Status should be NotSet");
    }
    public function testRunFailed() {
        $transfer = $this->getWorkflow($this::Domain);        
        $step = $transfer->next();
        $result = $step->run();
        $this->assertEquals(OrderStatusType::Invalid,$step->getStatus(),"The Status should be Invalid");
        $this->assertEquals(404,$step->getCode(),"The Code should be 404");
    }
    public function testGetFailedRun() {
        $transfer = $this->getWorkflow($this::Domain);        
        $transfer->getDb()->id(1);
        $step = $transfer->getSteps()[0];
        $this->assertEquals(OrderStatusType::Invalid,$step->getStatus(),"The Status should be NotSet");
        $this->assertEquals(404,$step->getCode(),"The Code should be 404");
    }
    public function testRunAction() {
        global $lastOrderId;
        if($lastOrderId) {
            $order = new Order();
            $order->setOrderId($lastOrderId);
            $order->poll();    
        }
        $domain = new Domain();
        $domain->setDomainName("again-manuel.com");
        $transfer = new InternalTransfer($domain,"testwf","Testing Workflow");      
        $transfer->init();
        $step = $transfer->next();
        $result = $step->run();
        $lastOrderId = $result->getOrder()->getOrderId();
        $this->assertEquals(200,$step->getCode(),"The Code should be 200");
    }
    public function testProcessNext() {
        global $lastOrderId;
        $order = new Order();
        $order->setOrderId($lastOrderId);
        $order->poll();    
        $order->getDb();
        $this->assertEquals(OrderStatusType::Completed,$order->getStatus(),"The Status-Code of the ordershould be 200");
    }
    private function getWorkflow($domainName) : InternalTransfer {
        $domain = new Domain();
        $domain->setDomainName($domainName);
        $wf = new InternalTransfer($domain,"testwf","Testing Workflow");
        $wf->load();
        return $wf;
    }
    

    
}

