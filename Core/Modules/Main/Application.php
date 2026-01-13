<?php

namespace Core\Modules\Main;

use Core\Traits\Patterns\Singleton;

class Application
{
    use Singleton;

    public readonly string $rootPath;
    public readonly string $devPath;

    private string $currentDir;
    private string $scriptName;

    protected function __construct()
    {
        $this->rootPath = str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']);
        $this->devPath = $this->rootPath . DIRECTORY_SEPARATOR . 'Dev';

        $currentDir = $_SERVER['REQUEST_URI'];
        if ($currentDir[-1] !== '/')
        {
            $currentDir = dirname($currentDir);
        }

        $this->scriptName = basename($_SERVER['REQUEST_URI']);
        if (str_starts_with($currentDir, $this->rootPath))
        {
            $this->currentDir = substr($currentDir, strlen($this->rootPath));
        }
        else
        {
            $this->currentDir = $currentDir;
        }

        if ($this->currentDir === '' || $currentDir[-1] !== '/')
        {
            $this->currentDir .= '/';
        }
    }

    /**
     * @return string
     */
    public function getCurrentDir(): string
    {
        return $this->currentDir;
    }

    /**
     * @return string
     */
    public function getScriptName(): string
    {
        return $this->scriptName;
    }

    /**
     * @return string
     */
    public function getDevPath(): string
    {
        return $this->devPath;
    }

    /**
     * @return string
     */
    public function getRootPath(): string
    {
        return $this->rootPath;
    }
}