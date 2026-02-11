<?php
namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Yippy\ToastUiEditorBundle\Form\Type\ToastUiEditorType;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('yippy_toast_ui_editor.form.type', ToastUiEditorType::class)
        ->args([
            service('yippy_toast_ui_editor.configuration'),
            expr("container.hasParameter('locale') ? parameter('locale') : null"),
        ])
        ->tag('form.type');
};