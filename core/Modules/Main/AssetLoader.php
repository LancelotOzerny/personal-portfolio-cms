<?php

namespace Core\Modules\Main;

use Core\Traits\Patterns\Singleton;

class AssetLoader
{
    use Singleton;

    public AssetLoaderContainer $styles;
    public AssetLoaderContainer $scripts;

    protected function __construct()
    {
        $this->styles = new AssetLoaderContainer();
        $this->scripts = new AssetLoaderContainer();
    }

    public function getLinks(): array
    {
        return $this->styles->getFormattedString(
            '<link rel="stylesheet" type="text/css" href="#PLACE_ITEM#">');
    }

    public function getScripts(): array
    {
        return $this->scripts->getFormattedString(
            '<script type="text/javascript" src="#PLACE_ITEM#"></script>');
    }
}

class AssetLoaderContainer
{
    private array $container = [];

    public function add(string $item) : void
    {
        if (!in_array($item, $this->container)) {
            $this->container[] = $item;
        }
    }

    function getAll() : array
    {
        return $this->container;
    }

    function getFormattedString($format) : array
    {
        $result = [];
        foreach ($this->getAll() as $item) {
            $result[] = str_replace("#PLACE_ITEM#", $item, $format);
        }

        return $result;
    }
}