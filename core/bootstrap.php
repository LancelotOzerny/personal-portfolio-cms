<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$redirect_url = $_SERVER['REDIRECT_URL'];

try
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $redirect_url))
    {
        $buffer = ob_start();
        include_once ($_SERVER['DOCUMENT_ROOT'] . $redirect_url);
        $buffer = ob_get_clean();

        echo $buffer;
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