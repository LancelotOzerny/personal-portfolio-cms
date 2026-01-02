<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$redirect_url = $_SERVER['REDIRECT_URL'];

try
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $redirect_url))
    {
        $pageContent = ob_start();
        include_once ($_SERVER['DOCUMENT_ROOT'] . $redirect_url);
        $pageContent = ob_get_clean();

        $links = \Modules\Main\AssetLoader::getInstance()->getLinks();
        $pageContent = str_replace('</head>', join("\n", $links) . '</head>', $pageContent);

        $scripts = \Modules\Main\AssetLoader::getInstance()->getScripts();
        $pageContent = str_replace('</body>', join("\n", $scripts) . '</body>', $pageContent);

        echo $pageContent;
    }
}
catch (Throwable $e)
{
    echo '<pre>';
    print_r([
        $e->getMessage(),
        $e->getFile(),
        $e->getLine(),
    ]);
    echo '</pre>';
}