<?php

namespace Modules\Main;

use Patterns\Singleton;

class Application
{
    use Singleton;

    public readonly string $rootPath;
    public readonly string $devPath;

    protected function __construct()
    {
        $this->rootPath = $_SERVER['DOCUMENT_ROOT'];
        $this->devPath = $this->rootPath . '/dev';
    }
}