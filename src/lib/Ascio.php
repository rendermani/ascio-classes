<?php
namespace ascio\lib;
require_once(__DIR__."/Errors.php");

use ascio\v2 as v2;
use ascio\v3\AscioService as V3Service;
use ascio\v2\AscioServices as V2Service; 
use ascio\dns\DnsService as DnsService;
use ascio\v2\Session;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\v2\LogOut;

class AscioEnvironment {
    const Live = "live";
    const Testing = "testing";
}
class LockType {
    const Update = "UPDATE_LOCK";
    const Transfer = "TRANSFER_LOCK";
    const Delete = "DELETE_LOCK";
}

class Ascio {
    public static function setConfigFile($filePath=null) {
        global $_ascioConfig, $_ascioConfigEnv; 
        if($filePath==null) $filePath =  __DIR__."/../../../../../config.json";
        $realPath = realpath($filePath);
        assert ($realPath !== false, new \Exception($filePath. " not found!"));
        if(file_exists($filePath)) {
            $file = file_get_contents(realpath($filePath));         
        } else {
            throw new AscioException("Config file ".$filePath." does not exist",404);
        }       
        $_ascioConfig = json_decode($file);
        //Ascio::setDb();                        
    }
    public static function setConfig($configObject) {
        global $_ascioConfig; 
        $_ascioConfig = $configObject;                
    }
    public static function setPartner($partner) {
        global $_ascioConfigPartner; 
        $_ascioConfigPartner = $partner;                
    }
    public static function getPartner() {
        global $_ascioConfigPartner; 
        return $_ascioConfigPartner ? $_ascioConfigPartner : self::getConfig()->v2->account;                
    }
    public static function setDb() {    
        $db = Ascio::getConfig()->db;    
        $capsule = new Capsule;        
        $capsule->addConnection((array) Ascio::getConfig()->db);            
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        
    }
    public static function getConfig() {
        global $_ascioConfig, $_ascioConfigEnv;
        if(!$_ascioConfig) {
            Ascio::setConfigFile();
        }
        assert(
            $_ascioConfigEnv==AscioEnvironment::Testing || $_ascioConfigEnv==AscioEnvironment::Live,
            new \Exception('Please setEnvironment(): Ascio::setEnvironment(AscioEnvironment:Testing)'));
        if(isset($_ascioConfigEnv->fields)) {
            $_ascioConfigEnv->fields = $_ascioConfig->fields;
        }
        return $_ascioConfig->$_ascioConfigEnv;
    }
    /**
     * @param AscioEnvironment $environment AscioEnvironment::Live (live) or AscioEnvironment ::Testing (testing)
     */
    public static function setEnvironment($environment) {
        global $_ascioConfigEnv; 
        $_ascioConfigEnv = $environment;
    }
    public static function getEnvironment() {
        global $_ascioConfigEnv; 
        return $_ascioConfigEnv;
    }
    public static function getClientV2() : V2ServiceExt {
        $client = new V2Client(Ascio::getConfig()->v2);
        return $client->getClient();
    }
    public static function getClientV3() : V3Service  {
        $client = new V3Client(Ascio::getConfig()->v3);
        return $client->getClient();
    }
    public  static function getClientDns() : DnsService {
        $client = new DnsClient(Ascio::getConfig()->dns);
        return $client->getClient();
    }
}
class Client {
    protected $account;
    protected $password; 
    protected $wsdl;

    public function __construct(Object $config) {
        foreach($config as $key => $value) {
            $this->$key = $value; 
        }
    }
}
class V2Client  extends Client{
    public function getClient() : V2ServiceExt {
        global $_ascioV2Service;
        if($_ascioV2Service) return $_ascioV2Service;
        $options = [
            "trace" => true,
            "classmap" => [
                'Order' => 'ascio\\lib\\v2\\Order',           
                'Domain' => 'ascio\\lib\\v2\\Domain',          
                'Registrant' => 'ascio\\lib\\v2\\Registrant',          
                'Contact' => 'ascio\\lib\\v2\\Contact',
                'NameServers' => 'ascio\\lib\\v2\\NameServers',
                'NameServer' => 'ascio\\lib\\v2\\NameServer',
                'DnsSecKeys' => 'ascio\\lib\\v2\\DnsSecKeys',
                'DnsSecKey' => 'ascio\\lib\\v2\\DnsSecKey',
                'TradeMark' => 'ascio\\lib\\v2\\TradeMark',
                'Message' => 'ascio\\lib\\v2\\Message',
                'QueueItem' => 'ascio\\lib\\v2\\QueueItem',
                'PrivacyProxy' => 'ascio\\lib\\v2\\PrivacyProxy',
                'Attachment' => 'ascio\\lib\\v2\\Attachment',
                'Extensions' => 'ascio\\lib\\v2\\Extensions',
                'Extension' => 'ascio\\lib\\v2\\Extension',
            ]
        ];
        $service = new V2ServiceExt($options,$this->wsdl);
        $service->setCredentials($this->account,$this->password);
        return $service;
    }    
}
class V3Client extends Client {

    public function getClient() : V3Service {
        global $_ascioV3Service;
        if($_ascioV3Service) return $_ascioV3Service;
        $service = new V3ServiceExt(["trace" => true],$this->wsdl);
        $credentials = array("Account"=>$this->account, "Password" => $this->password);
        $header = new \SoapHeader("http://www.ascio.com/2013/02","SecurityHeaderDetails", $credentials, false);
        $service->__setSoapHeaders($header);
        $_ascioV3Service = $service; 
        return $service;
    }
    
}
class DnsClient extends Client {
    protected $actAs = false; 
    protected $partner = false; 
    public function getClient() : DnsService {
        global $_ascioDnsService;
        if($_ascioDnsService) return $_ascioDnsService;
        $service = new DnsServiceExt(["trace" => true],$this->wsdl);
        $ns = 'http://groupnbt.com/2010/10/30/Dns/DnsService'; //Namespace of the WS. 
        $headers = array(); 
        $headers[] = new \SoapHeader($ns,'UserName', $this->account);
        $headers[] = new \SoapHeader($ns, 'Password', $this->password);
        if($this->actAs) $headers[] = new \SoapHeader($ns, 'ActAs', $this->actAs); 
        if($this->partnerAccount) $headers[] = new \SoapHeader($ns, 'Account', $this->partner);
        $service->__setSoapHeaders($headers);
        $_ascioDnsService = $service;
        return $service; 
    }
    public function actAs($actAs){
        $this->actAs = $actAs;
    }
    /**
     * string $partner the impersonation partner
     */
    public function setPartner($partner){
        $this->partner = $partner;
    }

}

class V2ServiceExt extends V2Service {
    protected $account;
    protected $password; 
    protected $sessionId; 
    public function setCredentials($account,$password) {
        $this->account = $account;
        $this->password = $password;
    }
   
    public function __soapCall($function_name, $arguments, $options = NULL, $input_headers = NULL, &$output_headers = NULL)
    {
        global $_AscioSessionId;
        if($_AscioSessionId) {
            $arguments[0]->setSessionId($_AscioSessionId);
        } else {
            $arguments[0]->setSessionId($this->requestSessionId());
        }
        $result = parent::__soapCall($function_name, $arguments, $options, $input_headers, $output_headers);
        $resultName = "get".$function_name."Result";
        /**
         * $status ascio\v2\Response
         */
        $status = $result->$resultName();
        $code = $status->getResultCode();

        if($code==200) {
            return $result;
        } else if($code==401 && $function_name != "LogIn" ) {            
            $this->requestSessionId();      
            return $this->__soapCall($function_name, $arguments, $options, $input_headers, $output_headers);
        } else  {
            if(in_array($function_name,["CreateOrder","ValidateOrder"])) {
                $exception = new AscioOrderExceptionV2($status->getMessage(),$status->getResultCode());
                $exception->setOrder($result->getOrder());
            } else  {
                $exception = new AscioException($status->getMessage(),$status->getResultCode());
            }
            $exception->setResult($function_name,$arguments,$status,$result);
            $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
            throw $exception;
        }
        return $result; 
    }
    private function requestSessionId() {
        global $_AscioSessionId;  
        $session= array(
            "Account" => $this->account,
            "Password" => $this->password
        ); 
        $result = parent::__soapCall("LogIn",["LogIn" => ["session" => $session]]);
        $status = $result->getLoginResult();
        if($status->getResultCode()==200) {
            $_AscioSessionId = $result->getSessionId();
            return $_AscioSessionId;
        } else {
            $exception = new AscioException($status->getMessage(),$status->getResultCode());
            $exception->setResult("LogIn",$result,$status,$result);
            $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
            throw $exception;
        }
    }
    public function logOut(LogOut $logOut) {
        global $_AscioSessionId;  
        parent::__soapCall("LogOut",["LogOut" => ["sessionId" => $_AscioSessionId]]);
    }
}
class V3ServiceExt extends V3Service {
    protected $account;
    protected $password; 
    protected $sessionId; 
    public function setCredentials($account,$password) {
        $this->account = $account;
        $this->password = $password;
    }   
    public function __soapCall($function_name, $arguments, $options = NULL, $input_headers = NULL, &$output_headers = NULL)
    {
        $result = parent::__soapCall($function_name, $arguments, $options, $input_headers, $output_headers);
        $resultName = $function_name."Result";
        /**
         * $status ascio\v3\
         */
        $status = $result->$resultName;
        $code = $status->getResultCode();
        

        if($code==200) {
            return $status;
        } else   {
            if(in_array($function_name,["CreateOrder","ValidateOrder"])) {
                $exception = new AscioOrderExceptionV3($status->getResultMessage(),$status->getResultCode());
                $exception->setOrder($status->getOrderInfo());
            } else  {
                $exception = new AscioException($status->getResultMessage(),$status->getResultCode());
            }
            $exception->setResult($function_name,$arguments,$status,$status);
            $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
            throw $exception;
        }
        return $status;
    }
}
class DnsServiceExt extends DnsService {
    protected $account;
    protected $password; 
    protected $sessionId; 
    public function setCredentials($account,$password) {
        $this->account = $account;
        $this->password = $password;
    }   
    public function __soapCall($function_name, $arguments, $options = NULL, $input_headers = NULL, &$output_headers = NULL)
    {
        $result = parent::__soapCall($function_name, $arguments, $options, $input_headers, $output_headers);
        $resultName = "get".$function_name."Result";
        $status = $result->$resultName();
        $code = $status->getStatusCode();
        

        if($code==200) {
            return $status;
        } else   {
            $exception = new AscioException($status->getStatusMessage(),$status->getStatusCode());
            $exception->setResult($function_name,$arguments,$status,$status);
            $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
            throw $exception;
        }
        return $status;
    }
}