<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$redirect_url = $_SERVER['REDIRECT_URL'];
$userRights = 0;

try
{
    if (
        str_starts_with($redirect_url, '/admin/')
        && $redirect_url != '/admin/auth/index.php'
        && $userRights < 100
    )
    {
        header("Location: /admin/auth/");
    }

    if (file_exists($filePath = $_SERVER['DOCUMENT_ROOT'] . $redirect_url))
    {
        $pageContent = ob_start();
        include_once ($filePath);
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