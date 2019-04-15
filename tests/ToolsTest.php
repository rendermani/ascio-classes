<?php
use PHPUnit\Framework\TestCase;
use ascio\lib\v2\Order;
use ascio\lib\TestLib;
use ascio\v2\OrderType;
use ascio\v2\Domain;
use ascio\v2\OrderStatusType;
use ascio\lib\AscioException;
use ascio\lib\Tools;
use ascio\v2\LogOut;
use ascio\lib\Ascio;
/**
 * ToolsTest
 * @group Tools
 */
class ToolsTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        Testlib::clearTables();
        
    }
    public static function tearDownAfterClass() : void {
        Ascio::getClientV2()->LogOut(new LogOut(0));
    }
    /** @test */
    public function testReuseHandles()
    {
        $domain = TestLib::createDomain("ml@webrender.de");
        $order = new Order(OrderType::Register_Domain);
        $order->setDomain($domain);
        $order->queue(); 

        $domain2 = TestLib::createDomain("ml@webrender.de");
        $order2 = new Order(OrderType::Register_Domain);
        $order2->setDomain($domain2);

        Tools::reuseHandles($domain2);
        $this->assertNull($domain2->getAdminContact()->getEmail(),"A admin-email should not exist");
        $this->assertNotNull($domain2->getAdminContact()->getHandle(),"A admin-handle should exist");
        $this->assertEquals(
            $domain->getAdminContact()->getHandle(),
            $domain2->getAdminContact()->getHandle(),
            "Admin handles should be equal"
        ); 
        $this->assertEquals(
            $domain->getNameServers()->getNameServer1()->getHandle(),
            $domain2->getNameServers()->getNameServer1()->getHandle(),
            "Nameserver handles should be equal"
        ); 
        $this->assertEquals(
            $domain->getRegistrant()->getHandle(),
            $domain2->getRegistrant()->getHandle(),
            "Registrant handles should be equal"
        );
        $this->assertNotEquals(
            $domain2->getAdminContact()->getHandle(),
            $domain2->getTechContact()->getHandle(),
            "Tech and Admin handles should not be equal"
        );         
    }
    public function testNoReuseHandles()
    {
        $domain = TestLib::createDomain("ml2@webrender.de");
        $order = new Order(OrderType::Register_Domain);
        $order->setDomain($domain);
        
        Tools::reuseHandles($domain);
        $this->assertNull($domain->getAdminContact()->getHandle(),"A admin-handle should not exist");
        $this->assertEquals(
            "ml2@webrender.de",
            $domain->getAdminContact()->getEmail(),
            "The admin-email should be ml2@webrender.de");     
    }
    public function testNoDoubleStore()
    {
        $domain = TestLib::createDomain("ml@webrender.de");
        $order = new Order(OrderType::Register_Domain);
        $order->setDomain($domain);       
        Tools::reuseHandles($domain);
        $order->queue();

        $count = $domain->getAdminContact()->db->where("FirstName","Jane")->count();
        $this->assertEquals(
           1,
           $count
        );

    }
    
}
