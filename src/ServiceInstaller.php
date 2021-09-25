<?php
namespace TyPHP\ServicePlugin;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ServiceInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $commonPlugin = ['ty-php/rpc', 'ty-php/jobcenter'];
        if (in_array($package->getPrettyName(), $commonPlugin)) {
            return 'common/' . substr($package->getPrettyName(), 6);
        }

        $prefix = substr($package->getPrettyName(), 0, 15);
        if ('ty-php/service-' !== $prefix) {
            throw new \InvalidArgumentException('The package name:' . $prefix . ',unable to installed, should always start their package name with "ty-php/service-"');
        }

        return 'common/service/' . substr($package->getPrettyName(), 14);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        if ('service-plugin' === $packageType) {
            return true;
        } elseif ('common-plugin' === $packageType) {
            return true;
        }

        return false;
    }
}
