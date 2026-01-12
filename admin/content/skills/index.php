<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();

$skillsList = (new \Dev\Tables\SkillsTable())->getWithAreas();
?>

    <table class="crud-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Навык</th>
            <th>Прогресс</th>
            <th>Логотип</th>
            <th>Описание</th>
            <th>Группа</th>
            <th style="text-align: center;">Управление</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($skillsList as $skill): ?>
            <tr>
                <td><?= $skill['id'] ?></td>
                <td><?= $skill['name'] ?></td>
                <td><?= $skill['progress'] ?>%</td>
                <td><img src="<?= $skill['logo'] ?>" alt="preview image" width="96"></td>
                <td><?= $skill['description'] ?></td>
                <td><?= $skill['area_name'] ?></td>
                <td>
                    <div class="crud-table__control">
                        <a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a>
                        <a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <div class="page-block crud-footer crud-footer--between">
        <div class="table-info">
            <p>Навыки: 5/10</p>
        </div>
        <div class="table__control">
            <a class="btn btn--rounded btn--success btn--large" href="/admin/content/skills/create.php">Добавить</a>
        </div>
    </div>

<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>