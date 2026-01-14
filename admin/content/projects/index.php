<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();

$projectsList = (new \Dev\Tables\ProjectsTable())->getWithLinks();
?>
<table class="crud-table">
<thead>
  <tr>
    <th>ID</th>
    <th>Название</th>
    <th>Короткое описание</th>
    <th>preview image</th>
    <th style="text-align: center;">Control</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($projectsList as $item): ?>
      <tr>
          <td><?= $item['id'] ?></td>
          <td><?= $item['name'] ?></td>
          <td><?= $item['preview_text'] ?></td>
          <td><img src="<?= $item['preview_image'] ?>" alt="preview image" width="200"></td>
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
        <p>Проекты: 5/10</p>
    </div>
    <div class="table__control">
        <a class="btn btn--rounded btn--success btn--large" href="/admin/content/projects/create.php">Добавить</a>
    </div>
</div>

<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>