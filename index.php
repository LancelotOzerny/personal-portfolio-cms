<?php
use Modules\Main\Template;

Template::getInstance()->setTemplate('Main');
Template::getInstance()->setParam('title', 'Портфолио Веб разработчика');
Template::getInstance()->showHeader();
?>

<div class="page__block page__block--spaced" id="anchor-about-me">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title blue hashtag">О себе</p>
        </div>
        <div class="text-block">
            <?php
            (new \Components\IncludeBlock\IncludeBlock([
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
            (new \Components\SkillList\SkillList())->show();
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
    (new \Components\CertificatesList\CertificatesList(['count' => 6]))->show();
    ?>
</div>
<div class="page__block page__block--spaced" id="anchor-portfolio">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title right blue hashtag">Скромное портфолио</p>
        </div>
        <?php
        (new \Components\ProjectsList\ProjectsList())->show();
        ?>
    </div>
</div>
<?php Template::getInstance()->showFooter(); ?>