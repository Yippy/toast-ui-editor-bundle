<?php
namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Yippy\ToastUiEditorBundle\Config\ToastUiEditorConfiguration;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('yippy_toast_ui_editor.configuration', ToastUiEditorConfiguration::class)
        ->args([
            $config = [] 
        ]);
};