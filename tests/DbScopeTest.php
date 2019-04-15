<?php
use PHPUnit\Framework\TestCase;
use ascio\lib\v2\Order;
use ascio\lib\TestLib;
use ascio\v2\OrderType;
use ascio\v2\Domain;
use ascio\v2\OrderStatusType;
use ascio\lib\AscioException;
use ascio\v2\LogOut;
use ascio\lib\Ascio;
/**
 * DbScopeTest
 * @group Db
 */
class DbScopeTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        Testlib::clearTables();
        
    }   
    public static function tearDownAfterClass() : void {
        Ascio::getClientV2()->LogOut(new LogOut(0));
    }
    /** @test */
    public function testScopeInactiveOrders()
        {
            /**
             * @var Order $order
             */
            global $order;
    
            $domain = Testlib::createDomain("ml@webrender.de","ordertest");
            $order = new Order(OrderType::Register_Domain);
            $order->setDomain($domain);
            $order->queue();        
            // test inactive
            $this->assertFalse($order->db->active()->exists(),"There should not be active domains");
            // test active

        }
    /** @test */
    public function testScopeActiveOrders()
    {
        /**
         * @var Order $order
         */
        global $order;
        $order->db->where("OrderId",$order->getOrderId())->update(["Status" => OrderStatusType::Pending_Internal_Processing]);
        $this->assertTrue($order->db->active()->exists(),"There should be active domains");
    }
    /** @test */
    public function testNextOrder()
    {
        /**
         * @var Order $order
         */
        global $order;
        $order->db->where("OrderId",$order->getOrderId())->update(["Status" => OrderStatusType::Completed]);
        $domain = $order->getDomain();
        $domain->setRegPeriod(1);
        $nextOrder = new Order(OrderType::Renew_Domain);
        $nextOrder->setDomain($order->getDomain());        
        $nextOrder->queue();
        
        $nextOrder2 = new Order(OrderType::Expire_Domain);
        $nextOrder2->setDomain($order->getDomain());        
        $nextOrder2->queue();

        $testNext = new Order();
        $testNext->next($order->getDomain()->getDomainName());
        
        $this->assertEquals(
            $testNext->getDomain()->getDomainName(),
            $nextOrder->getDomain()->getDomainName(),
            "The domain name should match");
        $this->assertEquals(
            $testNext->getDomain()->getRegistrant()->getName(),
            $nextOrder->getDomain()->getRegistrant()->getName(),
            "The Registrant should match and exist");            
        $this->assertEquals(
            $testNext->getOrderId(),
            $nextOrder->getOrderId(),
            "The OrderId should match the next order. Not the one created after");
        $this->assertEquals(
            OrderStatusType::NotSet,
            $nextOrder->getStatus(),
            "The Status should be NotSet");

    }
    public function testBlockingPendingOrder()
    {
         /**
         * @var Order $order
         */
        global $order;
        $order->db->setAttribute("Status",OrderStatusType::Pending_Internal_Processing);
        $order->db->updateStatus();

        $nextOrder = new Order();
        $this->expectException(AscioException::class,"Should throw an Exception because an order is blocking");
        $nextOrder->next($order->getDomain()->getDomainName());
    } 
    public function testExistingContact() {
        $domain = TestLib::createDomain("ml@webrender.de"); 
        $same = $domain->getAdminContact()->db->same()->first();
        $this->assertNotNull($same,"A same contact schould exist");
        $this->assertEquals(
            $domain->getAdminContact()->getFirstName(),
            $same->getAttributes()["FirstName"],
            "FirstName should be equal"
        );
    } 
    public function testNonExistingContact() {
        $domain = TestLib::createDomain("ml2@webrender.de"); 
        $same = $domain->getAdminContact()->db->same()->doesntExist();
        $this->assertTrue($same,"A same contact should not exist");
    }  
}
