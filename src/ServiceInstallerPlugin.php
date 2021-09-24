<?php
namespace TyPHP\ServicePlugin;

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
    public function uninstall(Composer $composer, IOInterface $io) {

    }
    public function deactivate(Composer $composer, IOInterface $io) {

    }
}
