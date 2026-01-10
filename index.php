<?php
use Core\Modules\Main\Template;

Template::getInstance()->setTemplate('Main');
Template::getInstance()->setParam('title', 'Портфолио Веб разработчика');
Template::getInstance()->showHeader();
?>
<div class="page__block page__block--spaced theme--blue" id="anchor-top">
    <div class="page__container">
        <header class="main-header">
            <h1 class="main-header__title">
                <?php
                (new \Dev\Components\IncludeBlock\IncludeBlock(['src' => '/dev/Includes/Main/profile-name.php']))->show();
                ?>
            </h1>
            <div class="main-header__middle-wrapper">
                <p class="main-header__jobname">
                    <?php
                    (new \Dev\Components\IncludeBlock\IncludeBlock(['src' => '/dev/Includes/Main/profile-jobname.php']))->show();
                    ?>
                </p>
                <p class="main-header__slogan">
                    <?php
                    (new \Dev\Components\IncludeBlock\IncludeBlock(['src' => '/dev/Includes/Main/profile-slogan.php']))->show();
                    ?>
                </p>
            </div>
            <div class="main-header__buttons">
                <a class="btn btn--white btn--circle btn--medium" href="/uploads/docks/pdf/resume.pdf">Посмотреть CV</a>
                <a class="btn btn--white btn--circle btn--medium" href="#anchor-portfolio">Мои проекты</a>
            </div>
            <div class="main-header__profile">
                <img src="/assets/images/profile.png" />
            </div>
        </header>
    </div>
</div>
<div class="page__block page__block--spaced" id="anchor-about-me">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title blue hashtag">О себе</p>
        </div>
        <div class="text-block">
            <?php
            (new \Dev\Components\IncludeBlock\IncludeBlock([
                    'src' => '/dev/Includes/about-me.php'
            ]))->show();
            ?>
        </div>
    </div>
</div>
<div class="page__block page__block--spaced" id="anchor-skills">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title right blue hashtag">Навыки и стек</p>
        </div>
        <?php
            (new \Dev\Components\SkillList\SkillList())->show();
        ?>
    </div>
</div>
<div class="page__block page__block--spaced" id="anchor-certificates">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title blue hashtag">Дипломы и сертификаты</p>
        </div>
    </div>

    <?php
    (new \Dev\Components\CertificatesList\CertificatesList(['count' => 6]))->show();
    ?>
</div>
<div class="page__block page__block--spaced" id="anchor-portfolio">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title right blue hashtag">Скромное портфолио</p>
        </div>
        <?php
        (new \Dev\Components\ProjectsList\ProjectsList())->show();
        ?>
    </div>
</div>
<?php Template::getInstance()->showFooter(); ?>