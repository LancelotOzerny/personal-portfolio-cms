<!DOCTYPE html>
<html>
<head>
    <title>Портфолио WEB-Разработчика</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body class="page">
<header class="page-block">
    <div class="page__container">
        <div class="main-navigation">
            <div class="main-navigation__toggler-wrapper"><button class="main-navigation__toggler">&#9776;</button></div>
            <div class="navbar">
                <a class="navbar__link" href="#anchor-about-me">Обо мне</a>
                <a class="navbar__link" href="#anchor-skills    ">навыки</a>
                <a class="navbar__link" href="#anchor-certificates">образование</a>
                <a class="navbar__link" href="#anchor-portfolio">портфолио</a>
            </div>
            <div class="networks-line">
                <a class="networks-line__item" href="#">
                    <img class="networks-line__icon" src="/assets/icons/github.svg">
                </a>
                <a class="networks-line__item" href="#">
                    <img class="networks-line__icon" src="/assets/icons/gmail.svg">
                </a>
                <a class="networks-line__item" href="#">
                    <img class="networks-line__icon" src="/assets/icons/telegram.svg">
                </a>
                <a class="networks-line__item" href="#">
                    <img class="networks-line__icon" src="/assets/icons/vk.svg">
                </a>
            </div>
        </div>
    </div>
</header>
<div class="page__block page__block--spaced theme--blue">
    <div class="page__container">
        <header class="main-header">
            <h1 class="main-header__title">
                <?php
                (new \Components\IncludeBlock\IncludeBlock(['src' => '/dev/Includes/Main/profile-name.php']))->show();
                ?>
            </h1>
            <div class="main-header__middle-wrapper">
                <p class="main-header__jobname">
                <?php
                (new \Components\IncludeBlock\IncludeBlock(['src' => '/dev/Includes/Main/profile-jobname.php']))->show();
                ?>
                </p>
                <p class="main-header__slogan">
                <?php
                (new \Components\IncludeBlock\IncludeBlock(['src' => '/dev/Includes/Main/profile-slogan.php']))->show();
                ?>
                </p>
            </div>
            <div class="main-header__buttons">
                <a class="btn btn--white btn--circle btn--medium" href="/uploads/docks/pdf/resume.pdf">Посмотреть CV</a>
                <a class="btn btn--white btn--circle btn--medium" href="#">Мои проекты</a>
            </div>
            <div class="main-header__profile">
                <img src="/assets/images/profile.png" />
            </div>
        </header>
    </div>
</div>