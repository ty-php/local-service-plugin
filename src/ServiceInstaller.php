<?php
namespace XinMo\ServicePlugin;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ServiceInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 14);
        var_dump($prefix);
        if ('xinmo/service-' !== $prefix) {
            throw new \InvalidArgumentException('The package name:' . $prefix . ',unable to installed, should always start their package name with "wwwcto/plugin-"');
        }

        return 'common/service';
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'service-plugin' === $packageType;
    }
}
