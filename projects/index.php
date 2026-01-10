<?php
use Core\Modules\Main\Template;

Template::getInstance()->setTemplate('Main');
Template::getInstance()->setParam('title', 'Портфолио Веб разработчика');
Template::getInstance()->showHeader();
?>
<div class="page__block page__block--spaced" id="anchor-portfolio">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title right blue hashtag">Портфолио проектов</p>
        </div>
        <?php
        (new \Components\ProjectsList\ProjectsList())->show();
        ?>
    </div>
</div>
<?php Template::getInstance()->showFooter(); ?>