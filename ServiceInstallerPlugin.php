<?php
namespace XinMo\ServicePlugin;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class ServiceInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new ServiceInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
