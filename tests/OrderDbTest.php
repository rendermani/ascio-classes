<?php
declare(strict_types=1);

use ascio\lib\Ascio;
use ascio\lib\AscioEnvironment;
use ascio\lib\AscioException;
use ascio\lib\TestLib;
use ascio\lib\v2\Order;
use ascio\lib\v2\Domain;
use ascio\lib\v2\NameServer;
use ascio\lib\v2\NameServers;
use ascio\lib\v2\Contact;
use ascio\lib\v2\Registrant;

use ascio\v2\OrderType;
use ascio\v2\OrderStatusType;

use Illuminate\Database\Capsule\Manager as Capsule;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\Stub\Exception;
use ascio\v2\LogOut;


/**
 * @group Order
 *  
 */

final class OrderDbTest extends TestCase
{
    /**
     * @var Domain $domain 
     */
    public static function setUpBeforeClass () : void {
        TestLib::clearTables();
    }
    public static function tearDownAfterClass() : void {
        Ascio::getClientV2()->LogOut(new LogOut(0));
    }
    public function testInsertDataAndCreateTable(): void    {        
        
        $domainName = "adara-loves-manuel.com";
        $domain = new Domain();
        $domain->get($domainName);
        $this->verifyDomain($domain);

        $result = $domain->db->where("DomainHandle",$domain->getDomainHandle())->first();        
        $this->assertEquals(
            $domainName,
            $result->getAttributes()["DomainName"]
        );
        
    }
    public function testSyncDb(): void    {       
        $domain = new Domain();
        $domain->setDomainHandle("ADARALOV36431");
        $domain->db->sync();
        $this->verifyDomain($domain);
        $this->assertEquals(
            $domain->db->getOldHandle(),
            $domain->getDomainHandle()
        );

    }
    public function testRegisterDomain() {
        global $lastOrderId; 
        $domain = TestLib::createDomain("ml@webrender.de","dbordertest");
        try {
            $order = $domain->register();  
        } catch (AscioException $e) {
            throw new Exception($e->debug());
        }
        $this->verifyDomain($order->getDomain());
        $this->hasRealId($order,"Order");
        $this->assertEquals(
            $domain->getDomainName(),
            $order->getDomain()->getDomainName()
        );
        $this->assertStringNotContainsString("_", $order->getOrderId());
        
        // check the written DB-Result        
        
        $result = $order->db->first(); 
        $this->assertEquals(
            $result->getAttributes()["OrderId"],
            $order->getOrderId()
        );
        $lastOrderId =  $order->getOrderId();

        $this->countDbAll($order);
    }
    public function testGetDb() {
        global $lastOrderId; 
        $order = new Order();
        $order->getDb($lastOrderId);
        $this->hasRealId($order,"order"); 
        $this->assertNotNull($order->getDomain(),"Domain should not be null after Regstration. Should have a temporary ID.");
        $this->countDbAll($order);
    }
    public function testUpdateAfterPoll () {
        global $lastOrderId;         
        $order = new Order();
        $order->setOrderId($lastOrderId);
        $order->poll();
        $this->assertEquals(
            OrderStatusType::Completed,
            $order->getStatus()
        );
        $this->countDbAll($order);
        $this->hasRealIds($order,"order");
        $this->noTmpIds();
    }
    
    private function verifyDomain(Domain $domain) {
        $this->assertInstanceOf(
            Registrant::class,
            $domain->getRegistrant()
        );
        $this->assertInstanceOf(
            Contact::class,
            $domain->getAdminContact()
        );
        $this->assertInstanceOf(
            NameServers::class,
            $domain->getNameServers()
        );
        $this->assertInstanceOf(
            NameServer::class,
            $domain->getNameServers()->getNameServer1()
        );
        $this->assertStringStartsWith(
            "ns1.ascio.",
            $domain->getNameServers()->getNameServer1()->getHostName()
        );
    }
    private function countDbAll($order) {
        $this->countDb($order->getDomain(),"DomainName",1);
        $this->countDb($order->getDomain()->getRegistrant(),"Name",1);
        $this->countDb($order->getDomain()->getAdminContact(),"FirstName",1);
        $this->countDb($order->getDomain()->getTechContact(),"FirstName",1);
        $this->countDb($order->getDomain()->getNameServers()->getNameServer1(),"HostName",1);
    }
    private function countDb($object, $property, $count) {
        $this->assertNotNull($object);
        $value = $object->{"get".$property}();
        $result = $object->db->where($property,$value)->count();
        $this->assertEquals(
            $count,
            $result,
            "There must be only ". $count . " " . get_class($object) . " with the Property " .$property. "='". $value . "' in the database. " 
        );
    }
    private function hasRealIds($object,$var) {        
        $this->hasRealId($object,$var);
        if($object->db) return;
        foreach($object->db->getLinkedHandles() as $var => $class) {            
            $this->hasRealIds($object->{"get".$var}(),$var);
        }
    }
    private function hasRealId($object,$var) {        
        if(!$object) return ;
        $name = get_class($object);
        $this->assertNotNull($object,$name. " should not be null");
        $this->assertStringNotContainsString("_", $object->getHandle(),$name. " should not have a temporary ID");
    }
    private function hasLinkedIds($object) {                
        if($object->db) return;
        foreach($object->db->getLinkedHandles() as $var => $class) {            
            $this->hasLinkedId($object,$var,$class);
        }
    }
    private function hasLinkedId($object,$var,$class) {        

        $linkedObject = $object->{"get".$var}();
        $linkedId = $linked->getHandle();
        $this->assertNotNull($object, '$object should not be null');
        $this->assertNotNull($linked,$class."->".$var. " should not be null");
        $this->assertNotNull($linked,$class."->".$var. " should not be null");
        $this->assertStringNotContainsString("_", $object->getHandle(),$name. " should not have a temporary ID");
    }
    private function noTmpIds() {
        return;
        //OPTIMIZE: Search for \_% doesn't work
        $result = Capsule::table("v2_Contact")->where("Handle","Like","\_%")->exists();
        $this->assertFalse($result,"Table Contact has temporary keys");
        $result = Capsule::table("v2_Registrant")->where("Handle","Like","\_%")->exists();
        $this->assertFalse($result,"Table Registrant has temporary keys");
        $result = Capsule::table("v2_NameServers")->where("Handle","Like","\_%")->exists();
        $this->assertFalse($result,"Table NamerServers should have temporary keys");
        $result = Capsule::table("v2_NameServer")->where("Handle","Like","\_%")->exists();
        $this->assertTrue($result,"Table NameServer has temporary keys");
        $result = Capsule::table("v2_Domain")->where("Handle","Like","\_%")->exists();
        $this->assertFalse($result,"Table Domain has temporary keys");
        $result = Capsule::table("v2_Order")->where("Handle","Like","\_%")->exists();
        $this->assertFalse($result,"Table Order has temporary keys");
        $result = Capsule::table("v2_DnsSecKeys")->where("Handle","Like","\_%")->exists();
        $this->assertTrue($result,"Table DnsSecKeys should have temporary keys");
    }
}

