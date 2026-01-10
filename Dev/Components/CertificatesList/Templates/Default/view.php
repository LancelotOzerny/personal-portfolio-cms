<div class="certificates-list">
    <?php foreach ($this->params['data'] as $certificate): ?>
    <div class="certificate__wrapper">
        <div class="certificate page__container
             <?= isset($certificate['theme']) ? 'certificate--' . $certificate['theme'] : '' ?>">

            <div class="certificate__left-side">
                <p class="certificate__title"><?= $certificate['title'] ?></p>

                <div class="certificate__description">
                    <p>&quot;<?= $certificate['name'] ?>&quot;</p>
                    <p>Дата получения: <?= $certificate['date'] ?></p>
                    <p><?= $certificate['additional'] ?></p>
                </div>
            </div>
            <div class="certificate__right-side">
                <?php if($certificate['logo']): ?>
                    <img class="certificate__logo" src="<?= $certificate['logo'] ?>"/>
                <?php endif; ?>
                <div>
                    <a class="btn btn--white btn--circle btn--large" href="<?= $certificate['download_link'] ?>">скачать (pdf)</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>