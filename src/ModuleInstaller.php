<?php

namespace Hechoenlaravel\JarvisPlatformComposerPlugin;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ModuleInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $parts = explode('/', $package->getPrettyName());
        if(count($parts) !== 2){
            throw new \InvalidArgumentException('The package name is incorrect for '. $package->getPrettyName());
        }
        return 'modules/'.$parts[0].'/'.$parts['1'];
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'jarvis-platform-module' === $packageType;
    }
}