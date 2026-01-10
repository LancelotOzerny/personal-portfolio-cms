<?php

namespace Core\Modules\Main;
class Autoload
{
    private static array $namespaces = [];

    public static function addNamespace($namespace, $path)
    {
        self::$namespaces[$namespace] = $path;
    }

    public static function autoload($className): void
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        if (file_exists($filePath = $root . '/' . str_replace('\\', '/', $className . '.php'))) {
            require $filePath;
            return;
        }

        foreach (self::$namespaces as $namespace => $path) {
            if (str_starts_with($className, $namespace)) {
                $filePath = str_replace('\\', '/', $root . $path . '/' . $className) . '.php';

                if (file_exists($filePath)) {
                    require $filePath;
                    return;
                }
            }
        }

        echo 'Class "' . $className . '" not found';
    }
}