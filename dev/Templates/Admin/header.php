<!DOCTYPE html>
<html>
<head>
    <title>WEB Project</title>
    <link rel="stylesheet" href="<?= $this->templatePath ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= $this->templatePath ?>/assets/css/components.css">
</head>
<body class="page">
<div class="admin-panel">
    <div class="sidebar">
        <div class="sidebar__title">Навигация</div>
        <div class="sidebar-list">
            <a class="sidebar-list__item active" href="/admin">Главная</a>
            <a class="sidebar-list__item" href="/admin/settings">Настройки сайта</a>
            <a class="sidebar-list__item" href="/admin/users/">Пользователи</a>

            <div class="sidebar-list__expand">
                <a class="sidebar-list__item" href="/admin/content/">Управление контентом</a>
                <div class="sidebar-list__sublist">
                    <div class="sidebar-list">
                        <a class="sidebar-list__item" href="/admin/content/projects/">Проекты</a>
                        <a class="sidebar-list__item" href="/admin/content/certificates/">Сертификаты</a>
                        <a class="sidebar-list__item" href="/admin/content/skills/">Навыки</a>
                    </div>
                </div>
            </div><a class="sidebar-list__item" href="/statistic/">Статистика</a>
        </div>
    </div>
    <div class="admin-panel__content">
        <header>
            <div class="page-title__wrapper">
                <p class="page-title page__title page-title--normal page-title--mini">Добро пожаловать в административную панель!</p>
            </div><a class="btn btn--info btn--large" href="/">Перейти на сайт</a>
        </header>
        <div class="admin-panel__inner">