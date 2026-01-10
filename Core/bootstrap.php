<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Core/Modules/Main/Autoload.php';
spl_autoload_register('Core\Modules\Main\Autoload::autoload');

$redirect_url = $_SERVER['REDIRECT_URL'];
$userRights = 0;

/*
 * Создать пользователя MSQYL
 * Реализовать класс пользователя
 * включить session в начале каждой страницы
 * Если значение времени сессии вышло (< 0) то выйти из системы
 * При наличии session поля IS_LOGGINED и его значении True найти пользователя
 * Если пользователь не найден - на страницу авторизации
 * Если нет SESSION поля или оно FALSE, то также на страницу авторизации
 *
 * Пользователь есть, все отлично. Если вход подтвердился и пользователь зашел, то сбросить время сесии до 30 минут и перевести на страницу авторизации
 * Когда пользователь авторизуется, нужно:
 *      1) Проверить вводимые значения
 *      2) Если введенные значения нормальные, то найти пользователя с нужным email
 *      3) Если пользователь найден, проверить пароль на эквивалентность по hash
 *      4) Если все совпало, то сделать redirect на главную /admin/ и добавить поля входа IS_LOGGINED и время сесии.
 *      5) Сыграть катку в доту
 * */

/*
 * Идеи для проектов
 *      1) TO DO LIST
 *      2) Жизненные приоритеты
 *      3)
 *      4)
 *      5)
 *      6)
 * */

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