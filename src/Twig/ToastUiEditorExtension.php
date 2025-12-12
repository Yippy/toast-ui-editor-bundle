<?php

namespace Yippy\ToastUiEditorBundle\Twig;

use Yippy\ToastUiEditorBundle\Renderer\ToastUiEditorRendererInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


final class ToastUiEditorExtension extends AbstractExtension implements ToastUiEditorRendererInterface
{
    /**
     * @var ToastUiEditorRendererInterface
     */
    private $renderer;

    public function __construct(ToastUiEditorRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function getFunctions(): array
    {
        $options = ['is_safe' => ['html']];

        return [
            new TwigFunction('toast_ui_editor_viewer_widget', [$this, 'renderViewer'], $options),
            new TwigFunction('toast_ui_editor_editor_widget', [$this, 'renderEditor'], $options),
            new TwigFunction('toast_ui_editor_dependencies', [$this, 'renderDependencies'], $options),
        ];
    }

    public function renderViewer(string $id, string $content, ?array $formConfig): string
    {
        return $this->renderer->renderViewer($id, $content, $formConfig);
    }

    public function renderEditor(string $id, array $config, string $content = null, ?array $formConfig): string
    {
        return $this->renderer->renderEditor($id, $config, $content, $formConfig);
    }

    public function renderDependencies(array $dependencies = null): string
    {
        return $this->renderer->renderDependencies($dependencies);
    }

}
