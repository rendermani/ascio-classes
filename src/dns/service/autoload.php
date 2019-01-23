<?php


 function autoload_e0b378f4da2ee1fd7d16941be975eaf8($class)
{
    $classes = array(
        'ascio\dns\DnsService' => __DIR__ .'/DnsService.php',
        'ascio\dns\GetRoles' => __DIR__ .'/GetRoles.php',
        'ascio\dns\GetRolesResponse' => __DIR__ .'/GetRolesResponse.php',
        'ascio\dns\Response' => __DIR__ .'/Response.php',
        'ascio\dns\ArrayOfRoleItem' => __DIR__ .'/ArrayOfRoleItem.php',
        'ascio\dns\RoleItem' => __DIR__ .'/RoleItem.php',
        'ascio\dns\CreateUser' => __DIR__ .'/CreateUser.php',
        'ascio\dns\User' => __DIR__ .'/User.php',
        'ascio\dns\CreateUserResponse' => __DIR__ .'/CreateUserResponse.php',
        'ascio\dns\UpdateUser' => __DIR__ .'/UpdateUser.php',
        'ascio\dns\UpdateUserResponse' => __DIR__ .'/UpdateUserResponse.php',
        'ascio\dns\DeleteUser' => __DIR__ .'/DeleteUser.php',
        'ascio\dns\DeleteUserResponse' => __DIR__ .'/DeleteUserResponse.php',
        'ascio\dns\GetUser' => __DIR__ .'/GetUser.php',
        'ascio\dns\GetUserResponse' => __DIR__ .'/GetUserResponse.php',
        'ascio\dns\SearchUser' => __DIR__ .'/SearchUser.php',
        'ascio\dns\ArrayOfSearchUserClause' => __DIR__ .'/ArrayOfSearchUserClause.php',
        'ascio\dns\SearchUserClause' => __DIR__ .'/SearchUserClause.php',
        'ascio\dns\SearchOperatorType' => __DIR__ .'/SearchOperatorType.php',
        'ascio\dns\SearchUserField' => __DIR__ .'/SearchUserField.php',
        'ascio\dns\SearchUserResponse' => __DIR__ .'/SearchUserResponse.php',
        'ascio\dns\ChangePassword' => __DIR__ .'/ChangePassword.php',
        'ascio\dns\ChangePasswordResponse' => __DIR__ .'/ChangePasswordResponse.php',
        'ascio\dns\CreateZone' => __DIR__ .'/CreateZone.php',
        'ascio\dns\ArrayOfRecord' => __DIR__ .'/ArrayOfRecord.php',
        'ascio\dns\Record' => __DIR__ .'/Record.php',
        'ascio\dns\WebForward' => __DIR__ .'/WebForward.php',
        'ascio\dns\RedirectionType' => __DIR__ .'/RedirectionType.php',
        'ascio\dns\SRV' => __DIR__ .'/SRV.php',
        'ascio\dns\CNAME' => __DIR__ .'/CNAME.php',
        'ascio\dns\SOA' => __DIR__ .'/SOA.php',
        'ascio\dns\TXT' => __DIR__ .'/TXT.php',
        'ascio\dns\PTR' => __DIR__ .'/PTR.php',
        'ascio\dns\MX' => __DIR__ .'/MX.php',
        'ascio\dns\A' => __DIR__ .'/A.php',
        'ascio\dns\AAAA' => __DIR__ .'/AAAA.php',
        'ascio\dns\NS' => __DIR__ .'/NS.php',
        'ascio\dns\MailForward' => __DIR__ .'/MailForward.php',
        'ascio\dns\CreateZoneResponse' => __DIR__ .'/CreateZoneResponse.php',
        'ascio\dns\DeleteZone' => __DIR__ .'/DeleteZone.php',
        'ascio\dns\DeleteZoneResponse' => __DIR__ .'/DeleteZoneResponse.php',
        'ascio\dns\GetZoneLog' => __DIR__ .'/GetZoneLog.php',
        'ascio\dns\GetZoneLogResponse' => __DIR__ .'/GetZoneLogResponse.php',
        'ascio\dns\ArrayOfZoneLogEntry' => __DIR__ .'/ArrayOfZoneLogEntry.php',
        'ascio\dns\ZoneLogEntry' => __DIR__ .'/ZoneLogEntry.php',
        'ascio\dns\RestoreZone' => __DIR__ .'/RestoreZone.php',
        'ascio\dns\RestoreZoneResponse' => __DIR__ .'/RestoreZoneResponse.php',
        'ascio\dns\GetZone' => __DIR__ .'/GetZone.php',
        'ascio\dns\GetZoneResponse' => __DIR__ .'/GetZoneResponse.php',
        'ascio\dns\Zone' => __DIR__ .'/Zone.php',
        'ascio\dns\SearchZoneNames' => __DIR__ .'/SearchZoneNames.php',
        'ascio\dns\ArrayOfSearchZoneClause' => __DIR__ .'/ArrayOfSearchZoneClause.php',
        'ascio\dns\SearchZoneClause' => __DIR__ .'/SearchZoneClause.php',
        'ascio\dns\SearchZoneField' => __DIR__ .'/SearchZoneField.php',
        'ascio\dns\SearchZoneNamesResponse' => __DIR__ .'/SearchZoneNamesResponse.php',
        'ascio\dns\SearchZone' => __DIR__ .'/SearchZone.php',
        'ascio\dns\ZoneInfoLevel' => __DIR__ .'/ZoneInfoLevel.php',
        'ascio\dns\SearchZoneResponse' => __DIR__ .'/SearchZoneResponse.php',
        'ascio\dns\ArrayOfZone' => __DIR__ .'/ArrayOfZone.php',
        'ascio\dns\SetZoneOwner' => __DIR__ .'/SetZoneOwner.php',
        'ascio\dns\SetZoneOwnerResponse' => __DIR__ .'/SetZoneOwnerResponse.php',
        'ascio\dns\CreateRecord' => __DIR__ .'/CreateRecord.php',
        'ascio\dns\CreateRecordResponse' => __DIR__ .'/CreateRecordResponse.php',
        'ascio\dns\UpdateRecord' => __DIR__ .'/UpdateRecord.php',
        'ascio\dns\UpdateRecordResponse' => __DIR__ .'/UpdateRecordResponse.php',
        'ascio\dns\DeleteRecord' => __DIR__ .'/DeleteRecord.php',
        'ascio\dns\DeleteRecordResponse' => __DIR__ .'/DeleteRecordResponse.php',
        'ascio\dns\GetRecord' => __DIR__ .'/GetRecord.php',
        'ascio\dns\GetRecordResponse' => __DIR__ .'/GetRecordResponse.php',
        'ascio\dns\ArrayOfstring' => __DIR__ .'/ArrayOfstring.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_e0b378f4da2ee1fd7d16941be975eaf8');

// Do nothing. The rest is just leftovers from the code generation.
{
}
