<?php

namespace ascio\lib\composer;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Update
{
    public static function postUpdate(Event $event)
    {
        $composer = $event->getComposer();
        file_put_contents("test.txt","avc");
        var_dump($composer);
        // do stuff
    }
    public static function postPackageInstall(PackageEvent $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        file_put_contents("test2.txt","avc");
        var_dump($installedPackage);
        // do stuff
    }
}