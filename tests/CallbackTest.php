<?php
use PHPUnit\Framework\TestCase;
use ascio\v3\OrderStatusType;
use ascio\lib\v2\Domain;
use ascio\lib\Ascio;
use ascio\v2\SearchDomain;
use ascio\v2\SearchCriteria;
use ascio\v2\Clause;
use ascio\v2\LogOut;
use ascio\lib\TestLib;
use ascio\lib\v2\Order;
/**
 * DbScopeTest
 * @group Db
 */
class CallbackTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        Testlib::clearTables();
             
    }   
    public static function tearDownAfterClass() : void {
        Ascio::getClientV2()->LogOut(new LogOut(0));
    }
    public function testCreateValidOrder() {        
        $prop = TestLib::getProperties("validorder");  
        $order = $prop->registerDomain();    
        $prop->setOrder($order);
        $this->assertEquals(200, $order->Code);        
        $this->assertEquals(OrderStatusType::NotSet, $order->getStatus());        
        $this->compareOrderWithDb($order);
    }
    public function testPollPending() {
        $prop = TestLib::getProperties("validorder");  
        $prop->poll();
        $this->assertContains("Pending",$prop->getOrder()->getStatus(),"The Status should be pending");
        $this->compareOrderWithDb($prop->getOrder());       
    }
    public function testPollCompleted() {
        
    }
    public function testGetCompleteStatus() {
        
    }  
    public function testGetCompleteMessage() {
        
    }   
    public function testCreateFailedOrder() {

    }
    public function testPollFailed() {
        
    }
    public function testGetFailedStatus() {
        
    }
    public function testGetFailedMessage() {
        
    }  
    public function testGetFailedMessages() {
        
    }
    public function testPollPendingEndUser() {
        
    }
    public function testGetPendingEndUserStatus() {
        
    }
    public function testGetPendingEndUserMessage() {
        
    }    
    public function testNextQueue() {

    }
    public function testNoNextQueue() {

    }
    public function testQueueNoPreviousOrder() {

    }
    public function testWorkflowNextStep() {
        
    }
    public function testWorkflowNextDomain() {
        
    }
    public function testWorkflowNoStep() {
        
    }
    public function testWorkflowNextSubstep () {

    }
    public function testWorkflowSubstepComplete () {
        
    }
    private function validateStatus($status,$code,$message) {

    }
 
    private function compareOrderWithDb(Order $order) {
        $dbOrder = new Order();
        $dbOrder->getDb($order->getOrderId());
        $this->assertEquals($order->getStatus(), $dbOrder->getStatus(),"The Status should match with the Database");
        $this->assertEquals($order->Code, $dbOrder->Code,"The Code should match with the Database");
        $this->assertEquals($order->Errors, $dbOrder->Errors,"The Errors should match with the Database");
        $this->assertEquals($order->getDomain()->getDomainHandle(), $dbOrder->getDomain()->getDomainHandle(),"The DomainHandle should match with the Database");
        $this->assertEquals($order->getDomain()->getRegistrant()->getHandle(), $dbOrder->getDomain()->getRegistrant()->getHandle(),"The Registrant Handle should match with the Database");
    }
    private function isCompleted(Order $order) {
        $this->assertEquals("Completed", $order->getStatus(),"The Status should be 'Completed'");
        $this->assertEquals("Completed", $order->getMessage(),"The Message should be 'Completed'");
        $this->assertEquals(200, $order->Code,"The Code should be 200");
        $this->assertEquals([], $order->Errors,"The Errors should be empty");
    }

}

