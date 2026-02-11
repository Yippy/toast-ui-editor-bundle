<?php
namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Yippy\ToastUiEditorBundle\Twig\ToastUiEditorExtension;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('yippy_toast_ui_editor.twig_extension', ToastUiEditorExtension::class)
        ->args([
            service('yippy_toast_ui_editor.renderer'),
        ])
        ->tag('twig.extension');
};