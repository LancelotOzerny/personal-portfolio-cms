<?php
\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Modules\Main\Template::getInstance()->showHeader();
?>
<div class="control-list">
    <div class="info-card">
      <div class="info-card__title">Проекты</div>
      <div class="info-card__description">Создайте новый проект в свое портфолио или измените текущий:название, описание, картинки, preview и многое другое.</div>
      <div class="info-card__buttons"><a class="btn btn--info" href="#">Перейти</a>
      </div>
    </div>
    <div class="info-card">
      <div class="info-card__title">Сертифкаты</div>
      <div class="info-card__description">Управляйте вашими личными сертификатами,добавляйте, редактируйте, изменяйте!</div>
      <div class="info-card__buttons"><a class="btn btn--info" href="#">Перейти</a>
      </div>
    </div>
    <div class="info-card">
      <div class="info-card__title">Навыки и прогресс</div>
      <div class="info-card__description">Научились чему-то новому? Самое время для того, чтобы добавить ваш новый навык в список.А может быть расширили свои знания в другом? Стоит увеличить прогресс!</div>
      <div class="info-card__buttons"><a class="btn btn--info" href="#">Перейти</a>
      </div>
    </div>
</div>


<?php
\Modules\Main\Template::getInstance()->showFooter();
?>