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
        <div class="cards-wrapper">
            <div class="card col-4">
                <div class="card__header">
                    <img class="card__image" src="/assets/images/project.png" alt="project preview image"/></div>
                <div class="card__content">
                    <p class="card__title">Проект 1</p>
                    <p class="card__description">
                        <lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar></lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                    </p>
                </div>
                <div class="card__footer"><a class="btn btn--white btn--medium" href="#">Git</a><a class="btn btn--white btn--medium" href="#">Demo</a>
                </div>
            </div>
            <div class="card col-4">
                <div class="card__header">
                    <img class="card__image" src="/assets/images/project.png" alt="project preview image"/></div>
                <div class="card__content">
                    <p class="card__title">Проект 1</p>
                    <p class="card__description">
                        <lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar></lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                    </p>
                </div>
                <div class="card__footer"><a class="btn btn--white btn--medium" href="#">Git</a><a class="btn btn--white btn--medium" href="#">Demo</a>
                </div>
            </div>
            <div class="card col-4">
                <div class="card__header">
                    <img class="card__image" src="/assets/images/project.png" alt="project preview image"/></div>
                <div class="card__content">
                    <p class="card__title">Проект 1</p>
                    <p class="card__description">
                        <lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar></lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                    </p>
                </div>
                <div class="card__footer"><a class="btn btn--white btn--medium" href="#">Git</a><a class="btn btn--white btn--medium" href="#">Demo</a>
                </div>
            </div>
            <div class="card col-4">
                <div class="card__header">
                    <img class="card__image" src="/assets/images/project.png" alt="project preview image"/></div>
                <div class="card__content">
                    <p class="card__title">Проект 1</p>
                    <p class="card__description">
                        <lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar></lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                    </p>
                </div>
                <div class="card__footer"><a class="btn btn--white btn--medium" href="#">Git</a><a class="btn btn--white btn--medium" href="#">Demo</a>
                </div>
            </div>
            <div class="card col-4">
                <div class="card__header">
                    <img class="card__image" src="/assets/images/project.png" alt="project preview image"/></div>
                <div class="card__content">
                    <p class="card__title">Проект 1</p>
                    <p class="card__description">
                        <lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar></lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                        <Lorem>ipsum dollar emmet Lorem ipsum dollar emmet Lorem ipsum dollar emmet</Lorem>
                    </p>
                </div>
                <div class="card__footer"><a class="btn btn--white btn--medium" href="#">Git</a><a class="btn btn--white btn--medium" href="#">Demo</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Template::getInstance()->showFooter(); ?>