<?php
namespace ascio\lib;
class Config {
	public $environment = "testing";
	public $configs =  array();
	public function __construct() {		
		$live = new ServerConfig("liveuser", "yyyy","xxx");
		$live->setWsdl("https://aws.ascio.com/v3/aws.wsdl","v3");
		$live->setWsdl("https://aws.ascio.com/2012/01/01/AscioService.wsdl","v2");
		$live->setWsdl("https://dnsservice.ascio.com/2010/10/30/DnsService.wsdl","asciodns");
		
		$testing = new ServerConfig("testuser", "yyy","xxx");
		$testing->setWsdl("https://awstest.ascio.com/v3/aws.wsdl","v3");
		$testing->setWsdl("https://awstest.ascio.com/2012/01/01/AscioService.wsdl","v2");
		
		$this->configs["live"] = $live;
		$this->configs["testing"] = $testing;
	}
	public function get($environment = "testing")  {
		return $this->configs[$environment];
	}
	public function getEmail() {
		return "xxx@yyy.com";
	}
}
class ServerConfig {
	private $wsdl = array();	
	public function __construct($environment,$account,$password) {
		$this->environment 	= $environment;
		$this->account 		= $account;
		$this->password 	= $password;
		$this->email 		= "manuel.lautenschlager@ascio.com";
	}
	public function setAccount($account) {
		$this->account = $account;
	}
	public function getAccount() {
		return $this->account;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function getPassword() {
		return $this->password;
	}

	public function setWsdl($wsdl,$version) {
		$this->wsdl[$version] = $wsdl;
	}
	public function getWsdl($version) {
		$wsdl = $this->wsdl[$version];
		if(!isset($wsdl)) {
			throw new Error("No WSDL file for ".$version);
		}
		return $wsdl;
	}
}