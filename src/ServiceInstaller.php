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
        if ('xinmo/rpc' == $package->getPrettyName()) {
            var_dump(substr($package->getPrettyName(), 6));
            return 'common/' . substr($package->getPrettyName(), 6);
        }

        $prefix = substr($package->getPrettyName(), 0, 14);
        if ('xinmo/service-' !== $prefix) {
            throw new \InvalidArgumentException('The package name:' . $prefix . ',unable to installed, should always start their package name with "xinmo/service-"');
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
            var_dump(1111);
            return true;
        }

        return false;
    }
}
