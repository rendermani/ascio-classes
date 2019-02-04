<?php

namespace ascio\dns;

class DnsService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'GetRoles' => 'ascio\\dns\\GetRoles',
  'GetRolesResponse' => 'ascio\\dns\\GetRolesResponse',
  'Response' => 'ascio\\dns\\Response',
  'ArrayOfRoleItem' => 'ascio\\dns\\ArrayOfRoleItem',
  'RoleItem' => 'ascio\\dns\\RoleItem',
  'CreateUser' => 'ascio\\dns\\CreateUser',
  'User' => 'ascio\\dns\\User',
  'CreateUserResponse' => 'ascio\\dns\\CreateUserResponse',
  'UpdateUser' => 'ascio\\dns\\UpdateUser',
  'UpdateUserResponse' => 'ascio\\dns\\UpdateUserResponse',
  'DeleteUser' => 'ascio\\dns\\DeleteUser',
  'DeleteUserResponse' => 'ascio\\dns\\DeleteUserResponse',
  'GetUser' => 'ascio\\dns\\GetUser',
  'GetUserResponse' => 'ascio\\dns\\GetUserResponse',
  'SearchUser' => 'ascio\\dns\\SearchUser',
  'ArrayOfSearchUserClause' => 'ascio\\dns\\ArrayOfSearchUserClause',
  'SearchUserClause' => 'ascio\\dns\\SearchUserClause',
  'SearchUserResponse' => 'ascio\\dns\\SearchUserResponse',
  'ChangePassword' => 'ascio\\dns\\ChangePassword',
  'ChangePasswordResponse' => 'ascio\\dns\\ChangePasswordResponse',
  'CreateZone' => 'ascio\\dns\\CreateZone',
  'ArrayOfRecord' => 'ascio\\dns\\ArrayOfRecord',
  'Record' => 'ascio\\dns\\Record',
  'WebForward' => 'ascio\\dns\\WebForward',
  'SRV' => 'ascio\\dns\\SRV',
  'CNAME' => 'ascio\\dns\\CNAME',
  'SOA' => 'ascio\\dns\\SOA',
  'TXT' => 'ascio\\dns\\TXT',
  'PTR' => 'ascio\\dns\\PTR',
  'MX' => 'ascio\\dns\\MX',
  'A' => 'ascio\\dns\\A',
  'AAAA' => 'ascio\\dns\\AAAA',
  'NS' => 'ascio\\dns\\NS',
  'MailForward' => 'ascio\\dns\\MailForward',
  'CreateZoneResponse' => 'ascio\\dns\\CreateZoneResponse',
  'DeleteZone' => 'ascio\\dns\\DeleteZone',
  'DeleteZoneResponse' => 'ascio\\dns\\DeleteZoneResponse',
  'GetZoneLog' => 'ascio\\dns\\GetZoneLog',
  'GetZoneLogResponse' => 'ascio\\dns\\GetZoneLogResponse',
  'ArrayOfZoneLogEntry' => 'ascio\\dns\\ArrayOfZoneLogEntry',
  'ZoneLogEntry' => 'ascio\\dns\\ZoneLogEntry',
  'RestoreZone' => 'ascio\\dns\\RestoreZone',
  'RestoreZoneResponse' => 'ascio\\dns\\RestoreZoneResponse',
  'GetZone' => 'ascio\\dns\\GetZone',
  'GetZoneResponse' => 'ascio\\dns\\GetZoneResponse',
  'Zone' => 'ascio\\dns\\Zone',
  'SearchZoneNames' => 'ascio\\dns\\SearchZoneNames',
  'ArrayOfSearchZoneClause' => 'ascio\\dns\\ArrayOfSearchZoneClause',
  'SearchZoneClause' => 'ascio\\dns\\SearchZoneClause',
  'SearchZoneNamesResponse' => 'ascio\\dns\\SearchZoneNamesResponse',
  'SearchZone' => 'ascio\\dns\\SearchZone',
  'SearchZoneResponse' => 'ascio\\dns\\SearchZoneResponse',
  'ArrayOfZone' => 'ascio\\dns\\ArrayOfZone',
  'SetZoneOwner' => 'ascio\\dns\\SetZoneOwner',
  'SetZoneOwnerResponse' => 'ascio\\dns\\SetZoneOwnerResponse',
  'CreateRecord' => 'ascio\\dns\\CreateRecord',
  'CreateRecordResponse' => 'ascio\\dns\\CreateRecordResponse',
  'UpdateRecord' => 'ascio\\dns\\UpdateRecord',
  'UpdateRecordResponse' => 'ascio\\dns\\UpdateRecordResponse',
  'DeleteRecord' => 'ascio\\dns\\DeleteRecord',
  'DeleteRecordResponse' => 'ascio\\dns\\DeleteRecordResponse',
  'GetRecord' => 'ascio\\dns\\GetRecord',
  'GetRecordResponse' => 'ascio\\dns\\GetRecordResponse',
  'ArrayOfstring' => 'ascio\\dns\\ArrayOfstring',
);

    /**
     * @param string $wsdl The wsdl file to use
     * @param array $options A array of config values
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
    
  foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
      $options = array_merge(array (
  'features' => 1,
), $options);
      if (!$wsdl) {
        $wsdl = 'https://dnsservice.ascio.com/2010/10/30/DnsService.wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param GetRoles $parameters
     * @return GetRolesResponse
     */
    public function GetRoles(GetRoles $parameters)
    {
      return $this->__soapCall('GetRoles', array($parameters));
    }

    /**
     * @param CreateUser $parameters
     * @return CreateUserResponse
     */
    public function CreateUser(CreateUser $parameters)
    {
      return $this->__soapCall('CreateUser', array($parameters));
    }

    /**
     * @param UpdateUser $parameters
     * @return UpdateUserResponse
     */
    public function UpdateUser(UpdateUser $parameters)
    {
      return $this->__soapCall('UpdateUser', array($parameters));
    }

    /**
     * @param DeleteUser $parameters
     * @return DeleteUserResponse
     */
    public function DeleteUser(DeleteUser $parameters)
    {
      return $this->__soapCall('DeleteUser', array($parameters));
    }

    /**
     * @param GetUser $parameters
     * @return GetUserResponse
     */
    public function GetUser(GetUser $parameters)
    {
      return $this->__soapCall('GetUser', array($parameters));
    }

    /**
     * @param SearchUser $parameters
     * @return SearchUserResponse
     */
    public function SearchUser(SearchUser $parameters)
    {
      return $this->__soapCall('SearchUser', array($parameters));
    }

    /**
     * @param ChangePassword $parameters
     * @return ChangePasswordResponse
     */
    public function ChangePassword(ChangePassword $parameters)
    {
      return $this->__soapCall('ChangePassword', array($parameters));
    }

    /**
     * @param CreateZone $parameters
     * @return CreateZoneResponse
     */
    public function CreateZone(CreateZone $parameters)
    {
      return $this->__soapCall('CreateZone', array($parameters));
    }

    /**
     * @param DeleteZone $parameters
     * @return DeleteZoneResponse
     */
    public function DeleteZone(DeleteZone $parameters)
    {
      return $this->__soapCall('DeleteZone', array($parameters));
    }

    /**
     * @param GetZoneLog $parameters
     * @return GetZoneLogResponse
     */
    public function GetZoneLog(GetZoneLog $parameters)
    {
      return $this->__soapCall('GetZoneLog', array($parameters));
    }

    /**
     * @param GetZone $parameters
     * @return GetZoneResponse
     */
    public function GetZone(GetZone $parameters)
    {
      return $this->__soapCall('GetZone', array($parameters));
    }

    /**
     * @param RestoreZone $parameters
     * @return RestoreZoneResponse
     */
    public function RestoreZone(RestoreZone $parameters)
    {
      return $this->__soapCall('RestoreZone', array($parameters));
    }

    /**
     * @param SearchZoneNames $parameters
     * @return SearchZoneNamesResponse
     */
    public function SearchZoneNames(SearchZoneNames $parameters)
    {
      return $this->__soapCall('SearchZoneNames', array($parameters));
    }

    /**
     * @param SearchZone $parameters
     * @return SearchZoneResponse
     */
    public function SearchZone(SearchZone $parameters)
    {
      return $this->__soapCall('SearchZone', array($parameters));
    }

    /**
     * @param SetZoneOwner $parameters
     * @return SetZoneOwnerResponse
     */
    public function SetZoneOwner(SetZoneOwner $parameters)
    {
      return $this->__soapCall('SetZoneOwner', array($parameters));
    }

    /**
     * @param CreateRecord $parameters
     * @return CreateRecordResponse
     */
    public function CreateRecord(CreateRecord $parameters)
    {
      return $this->__soapCall('CreateRecord', array($parameters));
    }

    /**
     * @param UpdateRecord $parameters
     * @return UpdateRecordResponse
     */
    public function UpdateRecord(UpdateRecord $parameters)
    {
      return $this->__soapCall('UpdateRecord', array($parameters));
    }

    /**
     * @param DeleteRecord $parameters
     * @return DeleteRecordResponse
     */
    public function DeleteRecord(DeleteRecord $parameters)
    {
      return $this->__soapCall('DeleteRecord', array($parameters));
    }

    /**
     * @param GetRecord $parameters
     * @return GetRecordResponse
     */
    public function GetRecord(GetRecord $parameters)
    {
      return $this->__soapCall('GetRecord', array($parameters));
    }

}
