<?php
namespace ascio\lib;
//OPTIMIZE: Should be included by autoload. Why? 
require_once(__DIR__."/Callback.php");
use ascio\lib\v2\Order;
use ascio\lib\v2\Domain;
use ascio\lib\v2\NameServer;
use ascio\lib\v2\NameServers;
use ascio\lib\v2\Contact;
use ascio\lib\v2\Registrant;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\v2\QueueItem;
use ascio\lib\v2\Callback;
class TestLib {
    
    public static function createDomain($email, $testName = "phptest") : Domain {
        $domainName = "asciotest-".$testName."-".(rand(0,100000)).".com";

        $registrant =  new Registrant();
        $registrant->setName("John Doe");
        $registrant->setAddress1("Address1Test");
        $registrant->setCity("CityTest");
        $registrant->setPostalCode("888349");
        $registrant->setCountryCode("DK");
        $registrant->setEmail($email);
        $registrant->setPhone("+45.123456789");
        
        $adminContact =  new Contact();
        $adminContact->setFirstName("Jane");
        $adminContact->setLastName("Doe");
        $adminContact->setAddress1("Address1Test");
        $adminContact->setPostalCode("888349");
        $adminContact->setCity("CityTest");
        $adminContact->setCountryCode("DK");
        $adminContact->setEmail($email);
        $adminContact->setPhone("+45.123456789");
        $adminContact->setType("owner");
        
        $techContact =  new Contact();
        $techContact->setFirstName("John");
        $techContact->setLastName("Doe");
        $techContact->setAddress1("Address1Test");
        $techContact->setPostalCode("888349");
        $techContact->setCity("CityTest");
        $techContact->setCountryCode("DK");
        $techContact->setEmail($email);
        $techContact->setPhone("+45.123456789");
        $techContact->setType("owner");
        
        $billingContact =  new Contact();
        $billingContact->setHandle("ML39643");
        
        $nameServer1 =  new NameServer();
        $nameServer1->setHostName("ns1.ascio.net");
        
        $nameServer2 =  new NameServer();
        $nameServer2->setHostName("ns2.ascio.net");
        
        $nameServers =  new NameServers();
        $nameServers->setNameServer1($nameServer1);
        $nameServers->setNameServer2($nameServer2);
        
        $domain =  new Domain();
        $domain->setDomainName($domainName);
        $domain->setRegistrant($registrant);
        $domain->setAdminContact($adminContact);
        $domain->setTechContact($techContact);
        $domain->setBillingContact($billingContact);
        $domain->setNameServers($nameServers);
        $domain->setDiscloseSocialData("true");            
        return $domain;
    
    }
    public static function clearTables(){
        $path = "/Users/ml/ownCloud/Keys/ascio/ascio.json";
        Ascio::setEnvironment(AscioEnvironment::Testing);
        Ascio::setConfigFile($path);
        if(Capsule::schema()->hasTable("v2_Contact")) Capsule::Schema()->drop("v2_Contact");
        if(Capsule::schema()->hasTable("v2_Registrant")) Capsule::Schema()->drop("v2_Registrant");
        if(Capsule::schema()->hasTable("v2_NameServers")) Capsule::Schema()->drop("v2_NameServers");
        if(Capsule::schema()->hasTable("v2_NameServer")) Capsule::Schema()->drop("v2_NameServer");
        if(Capsule::schema()->hasTable("v2_Domain")) Capsule::Schema()->drop("v2_Domain");
        if(Capsule::schema()->hasTable("v2_Order")) Capsule::Schema()->drop("v2_Order");
        if(Capsule::schema()->hasTable("v2_DnsSecKeys")) Capsule::Schema()->drop("v2_DnsSecKeys");
        if(Capsule::schema()->hasTable("Workflow")) Capsule::Schema()->drop("Workflow");
        if(Capsule::schema()->hasTable("WorkflowStep")) Capsule::Schema()->drop("WorkflowStep");
        if(Capsule::schema()->hasTable("v2_Message")) Capsule::Schema()->drop("v2_Message");
        if(Capsule::schema()->hasTable("v2_QueueItem")) Capsule::Schema()->drop("v2_QueueItem");
        if(Capsule::schema()->hasTable("v2_Attachment")) Capsule::Schema()->drop("v2_Attachment");
        if(Capsule::schema()->hasTable("v2_Extension")) Capsule::Schema()->drop("v2_Extension");
    }
    /**
     * @return TestProperties
     */
    public function getProperties ($name) : TestProperties {
        global $GlobalTestSingleton; 
        if (!$GlobalTestSingleton) {
            $GlobalTestSingleton = new TestSingleton();
        }
        return $GlobalTestSingleton->get($name);

    }
}
class TestSingleton {
    public $tests = [];
    public function get($name) : TestProperties {
        if(!$this->tests[$name]) {
             $this->tests[$name] = new TestProperties($name);             
        }
        return $this->tests[$name];
    }
}
class TestProperties {
    /**
     * Order $order
     */
    protected $order;
    protected $domain;
    protected $name;
    protected $email; 
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function registerDomain() : Order {
        $cfg = Ascio::getConfig();        
        $this->domain = TestLib::createDomain($cfg->email,$this->name);
        $this->order = $this->domain->register();         
        return $this->order;
    }

    public function poll()  : ?QueueItem {
        $newOrderId = false;
        while($newOrderId != $this->getOrder()->getOrderId()) {
            $callback = new Callback();
            $item = $callback->poll();                        
        }
        return $item; 
    }
    public function pollForStatus($orderId, OrderStatusType $status)  : ?QueueItem  {

    }
    /**
     * Get order $order
     */ 
    public function getOrder() : Order
    {
        return $this->order;
    }

    /**
     * Set order $order
     *
     * @return  self
     */ 
    public function setOrder(Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get the value of domain
     */ 
    public function getDomain() : Domain
    {
        return $this->domain;
    }

    /**
     * Set the value of domain
     *
     * @return  self
     */ 
    public function setDomain(Domain $domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail() : string
    {
        return $this->email;
    }
}