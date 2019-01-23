<?php

namespace ascio\v2;

class AscioServices extends \SoapClient
{

    /**
     * @var array $classmap The defined aws-classes
     */
    private static $classmap = array (
      'ArrayOfstring' => 'ascio\\v2\\ArrayOfstring',
      'LogIn' => 'ascio\\v2\\LogIn',
      'Session' => 'ascio\\v2\\Session',
      'LogInResponse' => 'ascio\\v2\\LogInResponse',
      'Response' => 'ascio\\v2\\Response',
      'LogOut' => 'ascio\\v2\\LogOut',
      'LogOutResponse' => 'ascio\\v2\\LogOutResponse',
      'GetOrder' => 'ascio\\v2\\GetOrder',
      'GetOrderResponse' => 'ascio\\v2\\GetOrderResponse',
      'Order' => 'ascio\\v2\\Order',
      'Domain' => 'ascio\\v2\\Domain',
      'Registrant' => 'ascio\\v2\\Registrant',
      'Contact' => 'ascio\\v2\\Contact',
      'NameServers' => 'ascio\\v2\\NameServers',
      'NameServer' => 'ascio\\v2\\NameServer',
      'TradeMark' => 'ascio\\v2\\TradeMark',
      'DnsSecKeys' => 'ascio\\v2\\DnsSecKeys',
      'DnsSecKey' => 'ascio\\v2\\DnsSecKey',
      'PrivacyProxy' => 'ascio\\v2\\PrivacyProxy',
      'Extensions' => 'ascio\\v2\\Extensions',
      'Extension' => 'ascio\\v2\\Extension',
      'CreateOrder' => 'ascio\\v2\\CreateOrder',
      'CreateOrderResponse' => 'ascio\\v2\\CreateOrderResponse',
      'SearchOrder' => 'ascio\\v2\\SearchOrder',
      'SearchOrderRequest' => 'ascio\\v2\\SearchOrderRequest',
      'ArrayOfOrderType' => 'ascio\\v2\\ArrayOfOrderType',
      'ArrayOfOrderStatusType' => 'ascio\\v2\\ArrayOfOrderStatusType',
      'PagingInfo' => 'ascio\\v2\\PagingInfo',
      'SearchOrderResponse' => 'ascio\\v2\\SearchOrderResponse',
      'ArrayOfOrder' => 'ascio\\v2\\ArrayOfOrder',
      'GetMessages' => 'ascio\\v2\\GetMessages',
      'GetMessagesResponse' => 'ascio\\v2\\GetMessagesResponse',
      'ArrayOfMessage' => 'ascio\\v2\\ArrayOfMessage',
      'Message' => 'ascio\\v2\\Message',
      'ArrayOfAttachment' => 'ascio\\v2\\ArrayOfAttachment',
      'Attachment' => 'ascio\\v2\\Attachment',
      'ValidateOrder' => 'ascio\\v2\\ValidateOrder',
      'ValidateOrderResponse' => 'ascio\\v2\\ValidateOrderResponse',
      'UploadDocumentation' => 'ascio\\v2\\UploadDocumentation',
      'UploadDocumentationResponse' => 'ascio\\v2\\UploadDocumentationResponse',
      'CreateSupportOrder' => 'ascio\\v2\\CreateSupportOrder',
      'CreateSupportOrderResponse' => 'ascio\\v2\\CreateSupportOrderResponse',
      'UploadMessage' => 'ascio\\v2\\UploadMessage',
      'UploadMessageResponse' => 'ascio\\v2\\UploadMessageResponse',
      'GetDomain' => 'ascio\\v2\\GetDomain',
      'GetDomainResponse' => 'ascio\\v2\\GetDomainResponse',
      'SearchDomain' => 'ascio\\v2\\SearchDomain',
      'SearchCriteria' => 'ascio\\v2\\SearchCriteria',
      'ArrayOfClause' => 'ascio\\v2\\ArrayOfClause',
      'Clause' => 'ascio\\v2\\Clause',
      'SearchDomainResponse' => 'ascio\\v2\\SearchDomainResponse',
      'ArrayOfDomain' => 'ascio\\v2\\ArrayOfDomain',
      'Whois' => 'ascio\\v2\\Whois',
      'WhoisResponse' => 'ascio\\v2\\WhoisResponse',
      'ArrayOfString' => 'ascio\\v2\\ArrayOfString',
      'AvailabilityCheck' => 'ascio\\v2\\AvailabilityCheck',
      'AvailabilityCheckResponse' => 'ascio\\v2\\AvailabilityCheckResponse',
      'ArrayOfAvailabilityCheckResult' => 'ascio\\v2\\ArrayOfAvailabilityCheckResult',
      'AvailabilityCheckResult' => 'ascio\\v2\\AvailabilityCheckResult',
      'GetRegistrant' => 'ascio\\v2\\GetRegistrant',
      'GetRegistrantResponse' => 'ascio\\v2\\GetRegistrantResponse',
      'CreateRegistrant' => 'ascio\\v2\\CreateRegistrant',
      'CreateRegistrantResponse' => 'ascio\\v2\\CreateRegistrantResponse',
      'DeleteRegistrant' => 'ascio\\v2\\DeleteRegistrant',
      'DeleteRegistrantResponse' => 'ascio\\v2\\DeleteRegistrantResponse',
      'SearchRegistrant' => 'ascio\\v2\\SearchRegistrant',
      'SearchRegistrantResponse' => 'ascio\\v2\\SearchRegistrantResponse',
      'ArrayOfRegistrant' => 'ascio\\v2\\ArrayOfRegistrant',
      'GetContact' => 'ascio\\v2\\GetContact',
      'GetRegistrantVerificationInfo' => 'ascio\\v2\\GetRegistrantVerificationInfo',
      'GetRegistrantVerificationInfoResponse' => 'ascio\\v2\\GetRegistrantVerificationInfoResponse',
      'RegistrantVerificationInfo' => 'ascio\\v2\\RegistrantVerificationInfo',
      'RegistrantVerificationDetails' => 'ascio\\v2\\RegistrantVerificationDetails',
      'DoRegistrantVerification' => 'ascio\\v2\\DoRegistrantVerification',
      'DoRegistrantVerificationResponse' => 'ascio\\v2\\DoRegistrantVerificationResponse',
      'GetRegistrantVerificationStatus' => 'ascio\\v2\\GetRegistrantVerificationStatus',
      'GetRegistrantVerificationStatusResponse' => 'ascio\\v2\\GetRegistrantVerificationStatusResponse',
      'UploadRegistrantVerificationMessage' => 'ascio\\v2\\UploadRegistrantVerificationMessage',
      'UploadRegistrantVerificationMessageResponse' => 'ascio\\v2\\UploadRegistrantVerificationMessageResponse',
      'GetContactResponse' => 'ascio\\v2\\GetContactResponse',
      'CreateContact' => 'ascio\\v2\\CreateContact',
      'CreateContactResponse' => 'ascio\\v2\\CreateContactResponse',
      'UpdateContact' => 'ascio\\v2\\UpdateContact',
      'UpdateContactResponse' => 'ascio\\v2\\UpdateContactResponse',
      'DeleteContact' => 'ascio\\v2\\DeleteContact',
      'DeleteContactResponse' => 'ascio\\v2\\DeleteContactResponse',
      'SearchContact' => 'ascio\\v2\\SearchContact',
      'SearchContactResponse' => 'ascio\\v2\\SearchContactResponse',
      'ArrayOfContact' => 'ascio\\v2\\ArrayOfContact',
      'GetNameServer' => 'ascio\\v2\\GetNameServer',
      'GetNameServerResponse' => 'ascio\\v2\\GetNameServerResponse',
      'CreateNameServer' => 'ascio\\v2\\CreateNameServer',
      'CreateNameServerResponse' => 'ascio\\v2\\CreateNameServerResponse',
      'DeleteNameServer' => 'ascio\\v2\\DeleteNameServer',
      'DeleteNameServerResponse' => 'ascio\\v2\\DeleteNameServerResponse',
      'SearchNameServer' => 'ascio\\v2\\SearchNameServer',
      'SearchNameServerResponse' => 'ascio\\v2\\SearchNameServerResponse',
      'ArrayOfNameServer' => 'ascio\\v2\\ArrayOfNameServer',
      'PollMessage' => 'ascio\\v2\\PollMessage',
      'PollMessageResponse' => 'ascio\\v2\\PollMessageResponse',
      'QueueItem' => 'ascio\\v2\\QueueItem',
      'ArrayOfCallbackStatus' => 'ascio\\v2\\ArrayOfCallbackStatus',
      'CallbackStatus' => 'ascio\\v2\\CallbackStatus',
      'AckMessage' => 'ascio\\v2\\AckMessage',
      'AckMessageResponse' => 'ascio\\v2\\AckMessageResponse',
      'GetMessageQueue' => 'ascio\\v2\\GetMessageQueue',
      'GetMessageQueueResponse' => 'ascio\\v2\\GetMessageQueueResponse',
      'GetDnsSecKey' => 'ascio\\v2\\GetDnsSecKey',
      'GetDnsSecKeyResponse' => 'ascio\\v2\\GetDnsSecKeyResponse',
      'CreateDnsSecKey' => 'ascio\\v2\\CreateDnsSecKey',
      'CreateDnsSecKeyResponse' => 'ascio\\v2\\CreateDnsSecKeyResponse',
      'SearchDnsSecKey' => 'ascio\\v2\\SearchDnsSecKey',
      'SearchDnsSecKeyResponse' => 'ascio\\v2\\SearchDnsSecKeyResponse',
      'ArrayOfDnsSecKey' => 'ascio\\v2\\ArrayOfDnsSecKey',
      'CreateDocumentation' => 'ascio\\v2\\CreateDocumentation',
      'CreateDocumentationResponse' => 'ascio\\v2\\CreateDocumentationResponse',
      'CreateApprovalDocumentation' => 'ascio\\v2\\CreateApprovalDocumentation',
      'ApprovalDocumentation' => 'ascio\\v2\\ApprovalDocumentation',
      'CreateApprovalDocumentationResponse' => 'ascio\\v2\\CreateApprovalDocumentationResponse',
    );

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = 'https://aws.ascio.com/2012/01/01/AscioService.wsdl')
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      parent::__construct($wsdl, $options);
    }

    /**
     * @param LogIn $parameters
     * @return LogInResponse
     */
    public function LogIn(LogIn $parameters)
    {
      return $this->__soapCall('LogIn', array($parameters));
    }

    /**
     * @param LogOut $parameters
     * @return LogOutResponse
     */
    public function LogOut(LogOut $parameters)
    {
      return $this->__soapCall('LogOut', array($parameters));
    }

    /**
     * @param GetOrder $parameters
     * @return GetOrderResponse
     */
    public function GetOrder(GetOrder $parameters)
    {
      return $this->__soapCall('GetOrder', array($parameters));
    }

    /**
     * @param CreateOrder $parameters
     * @return CreateOrderResponse
     */
    public function CreateOrder(CreateOrder $parameters)
    {
      return $this->__soapCall('CreateOrder', array($parameters));
    }

    /**
     * @param SearchOrder $parameters
     * @return SearchOrderResponse
     */
    public function SearchOrder(SearchOrder $parameters)
    {
      return $this->__soapCall('SearchOrder', array($parameters));
    }

    /**
     * @param GetMessages $parameters
     * @return GetMessagesResponse
     */
    public function GetMessages(GetMessages $parameters)
    {
      return $this->__soapCall('GetMessages', array($parameters));
    }

    /**
     * @param ValidateOrder $parameters
     * @return ValidateOrderResponse
     */
    public function ValidateOrder(ValidateOrder $parameters)
    {
      return $this->__soapCall('ValidateOrder', array($parameters));
    }

    /**
     * @param UploadDocumentation $parameters
     * @return UploadDocumentationResponse
     */
    public function UploadDocumentation(UploadDocumentation $parameters)
    {
      return $this->__soapCall('UploadDocumentation', array($parameters));
    }

    /**
     * @param CreateSupportOrder $parameters
     * @return CreateSupportOrderResponse
     */
    public function CreateSupportOrder(CreateSupportOrder $parameters)
    {
      return $this->__soapCall('CreateSupportOrder', array($parameters));
    }

    /**
     * @param UploadMessage $parameters
     * @return UploadMessageResponse
     */
    public function UploadMessage(UploadMessage $parameters)
    {
      return $this->__soapCall('UploadMessage', array($parameters));
    }

    /**
     * @param GetDomain $parameters
     * @return GetDomainResponse
     */
    public function GetDomain(GetDomain $parameters)
    {
      return $this->__soapCall('GetDomain', array($parameters));
    }

    /**
     * @param SearchDomain $parameters
     * @return SearchDomainResponse
     */
    public function SearchDomain(SearchDomain $parameters)
    {
      return $this->__soapCall('SearchDomain', array($parameters));
    }

    /**
     * @param Whois $parameters
     * @return WhoisResponse
     */
    public function Whois(Whois $parameters)
    {
      return $this->__soapCall('Whois', array($parameters));
    }

    /**
     * @param AvailabilityCheck $parameters
     * @return AvailabilityCheckResponse
     */
    public function AvailabilityCheck(AvailabilityCheck $parameters)
    {
      return $this->__soapCall('AvailabilityCheck', array($parameters));
    }

    /**
     * @param GetRegistrant $parameters
     * @return GetRegistrantResponse
     */
    public function GetRegistrant(GetRegistrant $parameters)
    {
      return $this->__soapCall('GetRegistrant', array($parameters));
    }

    /**
     * @param CreateRegistrant $parameters
     * @return CreateRegistrantResponse
     */
    public function CreateRegistrant(CreateRegistrant $parameters)
    {
      return $this->__soapCall('CreateRegistrant', array($parameters));
    }

    /**
     * @param DeleteRegistrant $parameters
     * @return DeleteRegistrantResponse
     */
    public function DeleteRegistrant(DeleteRegistrant $parameters)
    {
      return $this->__soapCall('DeleteRegistrant', array($parameters));
    }

    /**
     * @param SearchRegistrant $parameters
     * @return SearchRegistrantResponse
     */
    public function SearchRegistrant(SearchRegistrant $parameters)
    {
      return $this->__soapCall('SearchRegistrant', array($parameters));
    }

    /**
     * @param GetRegistrantVerificationInfo $parameters
     * @return GetRegistrantVerificationInfoResponse
     */
    public function GetRegistrantVerificationInfo(GetRegistrantVerificationInfo $parameters)
    {
      return $this->__soapCall('GetRegistrantVerificationInfo', array($parameters));
    }

    /**
     * @param DoRegistrantVerification $parameters
     * @return DoRegistrantVerificationResponse
     */
    public function DoRegistrantVerification(DoRegistrantVerification $parameters)
    {
      return $this->__soapCall('DoRegistrantVerification', array($parameters));
    }

    /**
     * @param GetRegistrantVerificationStatus $parameters
     * @return GetRegistrantVerificationStatusResponse
     */
    public function GetRegistrantVerificationStatus(GetRegistrantVerificationStatus $parameters)
    {
      return $this->__soapCall('GetRegistrantVerificationStatus', array($parameters));
    }

    /**
     * @param UploadRegistrantVerificationMessage $parameters
     * @return UploadRegistrantVerificationMessageResponse
     */
    public function UploadRegistrantVerificationMessage(UploadRegistrantVerificationMessage $parameters)
    {
      return $this->__soapCall('UploadRegistrantVerificationMessage', array($parameters));
    }

    /**
     * @param GetContact $parameters
     * @return GetContactResponse
     */
    public function GetContact(GetContact $parameters)
    {
      return $this->__soapCall('GetContact', array($parameters));
    }

    /**
     * @param CreateContact $parameters
     * @return CreateContactResponse
     */
    public function CreateContact(CreateContact $parameters)
    {
      return $this->__soapCall('CreateContact', array($parameters));
    }

    /**
     * @param UpdateContact $parameters
     * @return UpdateContactResponse
     */
    public function UpdateContact(UpdateContact $parameters)
    {
      return $this->__soapCall('UpdateContact', array($parameters));
    }

    /**
     * @param DeleteContact $parameters
     * @return DeleteContactResponse
     */
    public function DeleteContact(DeleteContact $parameters)
    {
      return $this->__soapCall('DeleteContact', array($parameters));
    }

    /**
     * @param SearchContact $parameters
     * @return SearchContactResponse
     */
    public function SearchContact(SearchContact $parameters)
    {
      return $this->__soapCall('SearchContact', array($parameters));
    }

    /**
     * @param GetNameServer $parameters
     * @return GetNameServerResponse
     */
    public function GetNameServer(GetNameServer $parameters)
    {
      return $this->__soapCall('GetNameServer', array($parameters));
    }

    /**
     * @param CreateNameServer $parameters
     * @return CreateNameServerResponse
     */
    public function CreateNameServer(CreateNameServer $parameters)
    {
      return $this->__soapCall('CreateNameServer', array($parameters));
    }

    /**
     * @param DeleteNameServer $parameters
     * @return DeleteNameServerResponse
     */
    public function DeleteNameServer(DeleteNameServer $parameters)
    {
      return $this->__soapCall('DeleteNameServer', array($parameters));
    }

    /**
     * @param SearchNameServer $parameters
     * @return SearchNameServerResponse
     */
    public function SearchNameServer(SearchNameServer $parameters)
    {
      return $this->__soapCall('SearchNameServer', array($parameters));
    }

    /**
     * @param PollMessage $parameters
     * @return PollMessageResponse
     */
    public function PollMessage(PollMessage $parameters)
    {
      return $this->__soapCall('PollMessage', array($parameters));
    }

    /**
     * @param AckMessage $parameters
     * @return AckMessageResponse
     */
    public function AckMessage(AckMessage $parameters)
    {
      return $this->__soapCall('AckMessage', array($parameters));
    }

    /**
     * @param GetMessageQueue $parameters
     * @return GetMessageQueueResponse
     */
    public function GetMessageQueue(GetMessageQueue $parameters)
    {
      return $this->__soapCall('GetMessageQueue', array($parameters));
    }

    /**
     * @param GetDnsSecKey $parameters
     * @return GetDnsSecKeyResponse
     */
    public function GetDnsSecKey(GetDnsSecKey $parameters)
    {
      return $this->__soapCall('GetDnsSecKey', array($parameters));
    }

    /**
     * @param CreateDnsSecKey $parameters
     * @return CreateDnsSecKeyResponse
     */
    public function CreateDnsSecKey(CreateDnsSecKey $parameters)
    {
      return $this->__soapCall('CreateDnsSecKey', array($parameters));
    }

    /**
     * @param SearchDnsSecKey $parameters
     * @return SearchDnsSecKeyResponse
     */
    public function SearchDnsSecKey(SearchDnsSecKey $parameters)
    {
      return $this->__soapCall('SearchDnsSecKey', array($parameters));
    }

    /**
     * @param CreateDocumentation $parameters
     * @return CreateDocumentationResponse
     */
    public function CreateDocumentation(CreateDocumentation $parameters)
    {
      return $this->__soapCall('CreateDocumentation', array($parameters));
    }

    /**
     * @param CreateApprovalDocumentation $parameters
     * @return CreateApprovalDocumentationResponse
     */
    public function CreateApprovalDocumentation(CreateApprovalDocumentation $parameters)
    {
      return $this->__soapCall('CreateApprovalDocumentation', array($parameters));
    }

}
