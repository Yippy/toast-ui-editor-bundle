<?php

namespace Yippy\ToastUiEditorBundle\Config;

use Yippy\ToastUiEditorBundle\Exception\ConfigException;

interface ToastUiEditorConfigurationInterface
{
    public function isEnable(): bool;

    public function isToHtml(): bool;

    public function getBasePath(): string;

    public function getDefaultConfig(): ?string;

    public function getConfigs(): array;

    public function getExtensions(): array;

    public function getDependencies(): array;

    public function getJquery(): array;

    public function getEditor(): array;

    public function getViewer(): array;

    /**
     * @throws ConfigException
     */
    public function getConfig(string $name): array;
}
