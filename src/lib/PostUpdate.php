<?php

namespace ascio\lib\composer;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Update
{
    public static function postUpdate(Event $event)
    {
        $composer = $event->getComposer();
        var_dump($composer);
        // do stuff
    }
    public static function postPackageInstall(PackageEvent $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        var_dump($installedPackage);
        // do stuff
    }
}