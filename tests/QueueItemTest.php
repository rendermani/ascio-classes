<?php
use PHPUnit\Framework\TestCase;
/**
 * DbScopeTest
 * @group Db
 */
class DbScopeTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        Testlib::clearTables();
        
    }   
    public static function tearDownAfterClass() : void {
        Ascio::getClientV2()->LogOut(new LogOut(0));
    }
    public function testGetMessage() {
        
    }
     
}
