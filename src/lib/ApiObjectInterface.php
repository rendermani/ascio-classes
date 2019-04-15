<?php
namespace ascio\lib;
interface ApiObjectInterface {

    public function get($handle = NULL) ;
    public function getDb($handle = NULL);
    public function getApi($handle = NULL);
    public function getProperties() : ?DbProperties;
    public function sync() : void  ;
    public function setHandle($handle);
    public function getHandle();

}