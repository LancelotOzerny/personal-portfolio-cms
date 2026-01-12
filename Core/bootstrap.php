<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Core/Modules/Main/Autoload.php';
spl_autoload_register('Core\Modules\Main\Autoload::autoload');

$redirect_url = $_SERVER['REDIRECT_URL'];
$currentUser = null;
$isAuthorised = false;

session_start();
if (
    isset($_SESSION['is_authorised'])
    && isset($_SESSION['login-time'])
    && isset($_SESSION['login-id'])
)
{
    $logTime = time() - $_SESSION['login-time'];

    if ($logTime > 1800)
    {
        session_destroy();
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    }
    else
    {
        $isAuthorised = true;
        $currentUser = (new \Core\Tables\UsersTable())->getById($_SESSION['login-id']);
    }
}

try
{
    if (
        str_starts_with($redirect_url, '/admin/')
        && $redirect_url != '/admin/auth/index.php'
        && (!$currentUser || $currentUser['level'] < 100)
    )
    {
        header("Location: /admin/auth/");
    }

    if (file_exists($filePath = $_SERVER['DOCUMENT_ROOT'] . $redirect_url))
    {
        $pageContent = ob_start();
        include_once ($filePath);
        $pageContent = ob_get_clean();

        $links = Core\Modules\Main\AssetLoader::getInstance()->getLinks();
        $pageContent = str_replace('</head>', join("\n", $links) . '</head>', $pageContent);

        $scripts = Core\Modules\Main\AssetLoader::getInstance()->getScripts();
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