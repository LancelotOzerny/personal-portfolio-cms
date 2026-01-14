<div class="cards-wrapper">
    <?php foreach ($this->params['data'] as $project): ?>
    <div class="card col-4">
        <div class="card__header">
            <img class="card__image" src="<?= $project['preview_image'] ?>" alt="<?= $project['name'] ?> preview image"/></div>
        <div class="card__content">
            <p class="card__title"><?= $project['name'] ?></p>
            <p class="card__description"><?= $project['preview_text'] ?></p>
        </div>
        <div class="card__footer">
            <?php foreach ($project['links'] as $link): ?>
            <a class="btn btn--white btn--outline btn--medium" href="<?= $link['url'] ?>"><?= $link['name'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>