<?php
namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Yippy\ToastUiEditorBundle\Renderer\ToastUiEditorRenderer;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('yippy_toast_ui_editor.renderer', ToastUiEditorRenderer::class)
        ->args([
            [], // Represents <argument type="collection" id="options"/>
            service('router'),
            service('assets.packages'),
            service('request_stack'),
            service('twig'),
            expr("container.hasParameter('locale') ? parameter('locale') : null"),
        ]);
};