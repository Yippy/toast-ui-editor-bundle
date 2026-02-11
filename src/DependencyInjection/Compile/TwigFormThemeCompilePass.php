<?php

namespace Yippy\ToastUiEditorBundle\DependencyInjection\Compile;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TwigFormThemeCompilePass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container): void
    {
        //add toast_ui_editor_widget.html.twig to form_theme
        $form_theme_old = $container->getParameter('twig.form.resources');
        $form_theme = array_merge($form_theme_old, ['@YippyToastUiEditor/Form/toast_ui_editor_widget.html.twig']);

        $container->getDefinition('twig.form.engine')->replaceArgument(0, $form_theme);
    }
}