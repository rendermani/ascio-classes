<?php
namespace ascio\lib;
require_once(__DIR__."/Errors.php");
use ascio\v2 as v2;
use ascio\v3\AscioService as V3Service;
use ascio\v2\AscioServices as V2Service; 
use ascio\dns\DnsService as DnsService;
use ascio\v2\Session;

class Ascio {
    public static function getConfig () {
        global $_ascioConfig; 
        $file = file_get_contents(__DIR__."/../../../../../config.json"); 
        $_ascioConfig = json_decode($file);                
    }
    /**
     * @return V2ServiceExt
     */
    public static function getClientV2($environment) : V2ServiceExt {
        global $_ascioConfig; 
        if(!$_ascioConfig) Ascio::getConfig();
        $client = new V2Client($_ascioConfig->$environment->v2);
        return $client->getClient();
    }
    public static function getClientV3($environment) : V3Service  {
        global $_ascioConfig; 
        if(!$_ascioConfig) Ascio::getConfig();
        $client = new V3Client($_ascioConfig->$environment->v3);
        return $client->getClient();
    }
    public  static function getClientDns($environment) : DnsService {
        global $_ascioConfig; 
        if(!$_ascioConfig) Ascio::getConfig();
        $client = new DnsClient($_ascioConfig->$environment->dns);
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
    public function getClient() : V2Service {
        global $_ascioV2Service;
        if($_ascioV2Service) return $_ascioV2Service;
        $service = new V2ServiceExt(["trace" => true],$this->wsdl);
        $service->setCredentials($this->account,$this->password);
        return $service;
    }    
}
class V3Client extends Client {

    public function getClient() : V3Service {
        global $_ascioV3Service;
        if($_ascioV3Service) return $_ascioV3Service;
        $service = new V3Service(["trace" => true],$this->wsdl);
        $credentials = array("Account"=>$this->account, "Password" => $this->Password);
        $header = new \SoapHeader("http://www.ascio.com/2013/02","SecurityHeaderDetails", $credentials, false);
        $credentials->__setSoapHeaders($header);
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
        $service = new DnsService(["trace" => true],$this->wsdl);
        $ns = 'http://groupnbt.com/2010/10/30/Dns/DnsService'; //Namespace of the WS. 
        $headers = array(); 
        $headers[] = new SoapHeader($ns,'UserName', $this->account);
        $headers[] = new SoapHeader($ns, 'Password', $this->password);
        if($this->actAs) $headers[] = new SoapHeader($ns, 'ActAs', $this->actAs); 
        if($this->partnerAccount) $headers[] = new SoapHeader($ns, 'Account', $this->partner);
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
        } else if($code==401 && $functionName != "LogIn" ) {            
            $this->requestSessionId();      
            return $this->__soapCall($function_name, $arguments, $options, $input_headers, $output_headers);
        } else  {
            $exception = new AscioException($status->getMessage(),$status->getResultCode());
            $exception->setResult($function_name,$arguments,$status->getValues());
            $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
            throw $exception;
        }
        return $result; 
    }
    public function requestSessionId() {
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
            $exception->setResult("LogIn",$login,$status->getValues());
            $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
            throw $exception;
        }
    }
}