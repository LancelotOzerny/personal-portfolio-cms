<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();

$users = (new \Core\Tables\UsersTable())->getAll();
?>

<?php if(count($users) > 0): ?>
<table class="crud-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>NickName</th>
        <th>Email</th>
        <th>Rights Level</th>
        <th style="text-align: center;">Control</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nickname'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['level'] ?></td>
            <td>
                <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p class="page-title page-title--light">Список пользователей пуст</p>
<?php endif; ?>

<div class="page-block">
    <div class="table-info">
      <p>Пользователи: <?= count($users) ?>/<?= count($users) ?></p>
    </div>
</div>

<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>