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
        <div class="skill-areas-list">
            <div class="skill-area">
                <div class="skill-area__description text-block">
                    <div class="skill-area__title">Frontend</div>lorem ipsum emmet dollar amir benge lorem ipsum emmet dollar amir benge
                    lorem ipsum emmet dollar amir benge lorem ipsum emmet dollar amir benge
                    lorem ipsum emmet dollar amir benge lorem ipsum emmet dollar amir benge
                </div>
                <div class="skill-area__list">
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">html</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">css</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">less</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">js</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">typescript</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">gulp</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="skill-area right">
                <div class="skill-area__description text-block">
                    <div class="skill-area__title">Backend</div>lorem ipsum emmet dollar amir benge lorem ipsum emmet dollar amir benge
                    lorem ipsum emmet dollar amir benge lorem ipsum emmet dollar amir benge
                    lorem ipsum emmet dollar amir benge lorem ipsum emmet dollar amir benge
                </div>
                <div class="skill-area__list">
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">php</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">1c-bitrix</p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                    <div class="skill-progress__wrapper">
                        <div class="skill-progress">
                            <p class="skill-progress__title">MySql  </p>
                            <div class="skill-progress__line">
                                <div class="skill-progress__fill"></div>
                            </div>
                            <div class="skill-progress__handler">55%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page__block page__block--spaced" id="anchor-certificates">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title blue hashtag">Дипломы и сертификаты</p>
        </div>
    </div>
    <div class="certificates-list">
        <div class="certificate__wrapper">
            <div class="certificate page__container certificate--orange">
                <div class="certificate__left-side">
                    <p class="certificate__title">Разработчик Bitrix Framework</p>
                    <div class="certificate__description">
                        <p>&quot;Интеграция дизайна и настройка платформы&quot;</p>
                        <p>Дата получения: 26.08.2023</p>
                        <p>Номер: CERT-EX-DEV-010-18327330-6925848-170239</p>
                    </div>
                </div>
                <div class="certificate__right-side"><img class="certificate__logo" src="assets/images/1c-bitrix-logo.png"/>
                    <div><a class="btn btn--white btn--circle btn--large" href="#">скачать (pdf)</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="certificate__wrapper">
            <div class="certificate page__container certificate--light">
                <div class="certificate__left-side">
                    <p class="certificate__title">Диплом бакалавра</p>
                    <div class="certificate__description">
                        <p>&quot;09.03.02 Информационные системы и технологии&quot;</p>
                        <p>Дата выдачи: 05.05.2024</p>
                        <p>Профиль: Разработка информационных систем</p>
                    </div>
                </div>
                <div class="certificate__right-side"><img class="certificate__logo" src="assets/images/volsu.png"/>
                    <div><a class="btn btn--white btn--circle btn--large" href="#">скачать (pdf)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page__block page__block--spaced" id="anchor-portfolio">
    <div class="page__container">
        <div class="section-title__wrapper">
            <p class="section-title right blue hashtag">Скромное портфолио</p>
        </div>
        <div class="cards-wrapper">
            <div class="card col-4">
                <div class="card__header"><img class="card__image" src="assets/images/project.png" alt="project preview image"/></div>
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
                <div class="card__header"><img class="card__image" src="assets/images/project.png" alt="project preview image"/></div>
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
                <div class="card__header"><img class="card__image" src="assets/images/project.png" alt="project preview image"/></div>
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
                <div class="card__header"><img class="card__image" src="assets/images/project.png" alt="project preview image"/></div>
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
                <div class="card__header"><img class="card__image" src="assets/images/project.png" alt="project preview image"/></div>
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