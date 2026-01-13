<!DOCTYPE html>
<html>
<head>
    <title>WEB Project</title>
    <link rel="stylesheet" href="<?= $this->templatePath ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= $this->templatePath ?>/assets/css/components.css">
</head>
<body class="page">
<div class="admin-panel">
    <?php (new Dev\Components\Navigation\Navigation([
        'dir' => '/admin/'
    ]))->show(); ?>

    <div class="admin-panel__content">
        <header>
            <div class="page-title__wrapper">
                <p class="page-title page__title page-title--normal page-title--mini">Добро пожаловать в административную панель!</p>
            </div><a class="btn btn--info btn--large" href="/">Перейти на сайт</a>
        </header>
        <div class="admin-panel__inner">