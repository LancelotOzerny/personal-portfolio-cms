<?php

namespace Core\Modules\Main;

use ReflectionClass;

class Component
{
    protected array $params = [];

    public function __construct(array $params = [])
    {
        $this->setComponentParams($params);

        $stylePath = $this->getTemplatePath() . '/template_style.css';
        if (file_exists(Application::getInstance()->rootPath . '/' . $stylePath))
        {
            AssetLoader::getInstance()->styles->add($stylePath);
        }

        $scriptPath = $this->getTemplatePath() . '/template_script.js';
        if (file_exists(Application::getInstance()->rootPath . '/' . $scriptPath))
        {
            AssetLoader::getInstance()->scripts->add($scriptPath);
        }
    }

    #[Override]
    protected function setComponentParams(array $params) : void
    {
        $this->params = $params;
    }

    public function show() : void
    {
        $templatePath = $this->getTemplatePath();
        include Application::getInstance()->rootPath . DIRECTORY_SEPARATOR . $templatePath . '/view.php';
    }

    protected function getTemplatePath() : string
    {
        $template = $this->params['template'] ?? 'Default';
        return dirname($this->getComponentFileName()) . '/Templates/' . $template;
    }

    protected function getComponentFileName() : string
    {
        $reflection = new ReflectionClass($this);
        return str_replace(Application::getInstance()->rootPath, '', $reflection->getFileName());
    }

    /**
     * @param string $stylePath
     * @return string
     */
    public function getStr(string $stylePath): string
    {
        return $stylePath;
    }
}