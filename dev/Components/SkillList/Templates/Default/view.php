<?php
$right_side = false;
?>

<div class="skill-areas-list">
    <?php foreach ($this->params['areas'] as $area): ?>
        <div class="skill-area <?= $right_side ? 'right' : '' ?>">
            <div class="skill-area__description text-block">
                <div class="skill-area__title"><?= $area['name'] ?></div>
                <?= $area['description'] ?>
            </div>

            <div class="skill-area__list">
                <?php foreach ($area['skills'] as $skill): ?>
                <div class="skill-progress__wrapper">
                    <div class="skill-progress">
                        <p class="skill-progress__title"><?= $skill['name'] ?></p>
                        <div class="skill-progress__line">
                            <div class="skill-progress__fill"></div>
                        </div>
                        <div class="skill-progress__handler"><?= $skill['progress'] ?>%</div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php $right_side = !$right_side; ?>
    <?php endforeach; ?>