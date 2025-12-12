<?php

namespace Yippy\ToastUiEditorBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Yippy\ToastUiEditorBundle\DependencyInjection\Compile\TwigFormThemeCompilePass;

class YippyToastUiEditorBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new TwigFormThemeCompilePass());

        parent::build($container);
    }

}