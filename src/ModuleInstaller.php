<?php

namespace Hechoenlaravel\JarvisPlatformComposerPlugin;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ModuleInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $ex = explode('/', $package->getPrettyName());
        if (!isset($ex[1])) {
            throw new \InvalidArgumentException(
                'Unable to install Module. '
                .'it Should always start their package name with '
                .'"vendor/jarvis-"'
            );
        }
        $prefix = substr($ex[1], 0, 6);
        if('jarvis-' !== $prefix)
        {
            throw new \InvalidArgumentException(
                'Unable to install Module. '
                .'it Should always start their package name with '
                .'"vendor/jarvis-"'
            );
        }
        return 'modules/'.substr($ex[1], 6);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'jarvis-platform-module' === $packageType;
    }
}