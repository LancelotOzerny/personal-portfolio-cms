<?php

namespace Modules\Main;

use Patterns\Singleton;

class Template
{
    use Singleton;
    private $templateName;
    private $templatePath;

    private array $params = [];
    public function setParam(string $param, $value)
    {
        $this->params[$param] = $value;
    }

    public function getParam(string $param)
    {
        return $this->params[$param] ?? null;
    }

    protected function __construct()
    {
        $this->setTemplate('Default');
    }

    function setTemplate($template)
    {
        $this->templateName = $template;
        $dev = str_replace(Application::getInstance()->rootPath, '', Application::getInstance()->devPath);
        $this->templatePath = $dev . '/Templates/' . $template;
    }

    function showHeader()
    {
        $filePath = Application::getInstance()->rootPath . $this->templatePath . '/header.php';
        if (file_exists($filePath))
        {
            include $filePath;
            return;
        }

        echo '<pre>';
        print_r($filePath);
        echo '</pre>';

        echo '<p>Header of template "' . $this->templateName . '" is not fouded!</p>';
    }

    function showFooter()
    {
        if (file_exists($filePath = Application::getInstance()->rootPath . $this->templatePath . '/footer.php'))
        {
            include $filePath;
            return;
        }

        echo '<p>Footer of template "' . $this->templateName . '" is not fouded!</p>';
    }
}