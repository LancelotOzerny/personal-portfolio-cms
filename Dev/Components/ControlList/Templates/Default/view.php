<?php if($this->params['count']): ?>
<div class="control-list">
    <?php foreach ($this->params['cards'] as $card): ?>
    <div class="info-card">
        <div class="info-card__title"><?= $card['title'] ?></div>
        <div class="info-card__description"><?= $card['desc'] ?></div>
        <div class="info-card__buttons">
            <a class="btn btn--info" href="<?= $card['link'] ?>">Перейти</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>