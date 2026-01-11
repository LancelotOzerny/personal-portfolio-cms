<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();
?>

<div class="control-list">
    <div class="info-card">
      <div class="info-card__title">Настройки сайта</div>
      <div class="info-card__description">Измените основные параметры сайта: название, описание, контактные данные,SEO-настройки, мета-теги и другие глобальные параметры.</div>
      <div class="info-card__buttons"><a class="btn btn--info" href="#">Перейти</a>
      </div>
    </div>
    <div class="info-card">
      <div class="info-card__title">Пользователи</div>
      <div class="info-card__description">Управляйте учётными записями: добавляйте новых пользователей,редактируйте права доступа, просматривайте активность и статистику.</div>
      <div class="info-card__buttons"><a class="btn btn--info" href="#">Перейти</a>
      </div>
    </div>
    <div class="info-card">
      <div class="info-card__title">Управление контентом</div>
      <div class="info-card__description">Редактируйте разделы сайта: проекты, статьи, услуги, отзывы.Добавляйте медиафайлы, управляйте публикациями и черновиками.</div>
      <div class="info-card__buttons"><a class="btn btn--info" href="#">Перейти</a>
      </div>
    </div>
    <div class="info-card">
      <div class="info-card__title">Статистика</div>
      <div class="info-card__description">Анализируйте посещаемость, источники трафика, поведение пользователей.Смотрите отчёты по просмотрам, конверсиям и ключевым метрикам.</div>
      <div class="info-card__buttons"><a class="btn btn--info" href="#">Перейти</a>
      </div>
    </div>
</div>

<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showFooter();
?>