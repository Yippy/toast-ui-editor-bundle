<?php

namespace Yippy\ToastUiEditorBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;

final class YippyToastUiEditorExtension extends Extension
{
    /**
     * @param array $configs   The configurations being loaded
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {

        $loader = new PhpFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $resources = [
            'config',
            'form',
            'renderer',
            'twig'
        ];

        foreach ($resources as $resource) {
            $loader->load($resource.'.php');
        }

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->getDefinition("yippy_toast_ui_editor.configuration")
            ->setArgument(0, $config);

        $container->getDefinition("yippy_toast_ui_editor.renderer")
                    ->setArgument(0, $config);

    }

}