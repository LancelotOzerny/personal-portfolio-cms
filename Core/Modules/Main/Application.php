<?php

namespace Core\Modules\Main;

use Core\Traits\Patterns\Singleton;

class Application
{
    use Singleton;

    public readonly string $rootPath;
    public readonly string $devPath;

    protected function __construct()
    {
        $this->rootPath = str_replace('/', DIRECTORY_SEPARATOR, $_SERVER['DOCUMENT_ROOT']);
        $this->devPath = $this->rootPath . DIRECTORY_SEPARATOR . 'Dev';
    }
}