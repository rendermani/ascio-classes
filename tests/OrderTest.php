<?php

use PHPUnit\Framework\TestCase;
use ascio\lib\v2\Order;
use ascio\lib\TestLib;
use ascio\v2\OrderType;
use ascio\v2\Domain;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\AscioException;
use ascio\v2\LogOut;
use ascio\lib\Ascio;
use ascio\lib\AscioOrderExceptionV2;
use ascio\lib\Tools;
use ascio\v2\OrderStatusType;
/**
 * OrderTest
 * @group Order
 */
class OrderTest extends TestCase
{
    public static function setUpBeforeClass () : void {
        TestLib::clearTables();        
    }
    public static function tearDownAfterClass() : void {
        Ascio::getClientV2()->LogOut(new LogOut(0));
    }
    /** @test */
    public function testQueueOrder()
    {  
        global $domain,$orderId; 
        $domain = TestLib::createDomain("ml@webrender.de","ordertest");
        
        $order = new Order(OrderType::Register_Domain);
        $order->setDomain($domain);       
        $order->queue(); 

        $orderId = $order->getOrderId();
        $order2 = new Order(OrderType::Expire_Domain);
        $order2->setDomain($domain);
        $order2->queue();  

        $result = Capsule::table("v2_Domain")->where("DomainName",$domain->getDomainName())->exists();
        $this->assertNotFalse($result,"Queued Domain doesn't exist in the database");
    }
    public function testProcessRegister() {
        global $domain;
        $order = new Order();
        //get Order and OrderID from DB. 
        $result = $order->db->where("Type",OrderType::Register_Domain)->first();
        $order->setOrderId($result->getAttributes()["OrderId"]);

        $order->process($domain);            
        $order->getDb();
        $this->assertEquals(OrderStatusType::NotSet,$order->getStatus());
    }
    public function testPollAndInvalidExpire() {
        global $domain,$orderId; 
        $order = new Order();
        //get Order and OrderID from DB. 
        $result = $order->db->where("Type",OrderType::Register_Domain)->first();
        $order->setOrderId($result->getAttributes()["OrderId"]);

        $this->expectException(AscioOrderExceptionV2::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('Order not validated');
        try {            
            $order->poll();      
        } catch (AscioOrderExceptionV2 $e) {
            echo $e->formatErrors();
            $this->assertEquals(
                "FO405 Object status (DeleteProhibitedLock) prohibits operation",
                $e->getErrors()[0]
            );
            throw $e;
        } catch(AscioException $e) {
            $e->debug();
            $e->debugSoap();
            throw $e;
        }
    } 
   public function testPollExpire() {
        $order = new Order();
        $result = $order->db->where("Type",OrderType::Expire_Domain)->first();
        $order->setOrderId($result->getAttributes()["OrderId"]);
        $order->poll();  
        $this->assertEquals("Invalid", $order->getStatus());          
    }  
}
