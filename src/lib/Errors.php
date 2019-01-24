<?php 
namespace ascio; 

class AscioException extends \Exception {
    public $values;
    public $request;
    public $method;
    public $soapRequest;
    public $soapResponse;
    function setResult($method, $request, $values) {
        $this->values = $values;
        $this->request = $request; 
        $this->method = $method; 
    }
    function setSoap($soapRequest,$soapResponse) {
        $this->soapRequest = $soapRequest;
        $this->soapResponse = $soapResponse;
    }
    
    public function debug() {
        if(php_sapi_name() == "cli") {
            echo "Request\n";
            var_dump($this->request);
            echo "Errors\n";
            var_dump($this->values);            
            echo $this->getCode() . "-" . $this->getMessage()."\n";
        }
        else {
            echo "<h3>".$this->getCode() . "-" . $this->getMessage()."</h3>";
            echo "<h4>Request</h4>";
            echo "<pre>".print_r($this->request,1)."</pre>";
            echo "<h4>Errors</h4>";
            echo "<pre>".print_r($this->values,1)."</pre>";
        }          
    }
    public function debugSoap() {
        if(php_sapi_name() == "cli") {
            echo "SOAP Request\n";
            var_dump($this->soapRequest);
            echo "SOAP Response\n";
            var_dump($this->soapResponse);            
        }
        else {
            echo "<h3>".$this->getCode() . "-" . $this->getMessage()."</h3>";
            echo "<h4>SOAP Request</h4>";
            echo "<pre>".print_r($this->request,1)."</pre>";
            echo "<h4>SOAP Response</h4>";
            echo "<pre>".print_r($this->values,1)."</pre>";
        }
          
    }
}