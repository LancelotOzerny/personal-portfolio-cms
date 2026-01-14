<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();

$certificates = [];
$itemsList = (new \Dev\Tables\CertificatesTable())->getAll();
?>
<table class="crud-table">
<thead>
  <tr>
    <th>ID</th>
    <th width="200">Название</th>
    <th>Информация</th>
    <th>preview image</th>
    <th style="text-align: center;">Control</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($itemsList as $item): ?>
  <tr>
      <td><?= $item['id'] ?></td>
      <td><?= $item['title'] ?></td>
      <td>
          <p><?= $item['name'] ?></p>
          <p>Дата выдачи: <?= $item['date'] ?></p>
          <p><?= $item['additional'] ?></p>
      </td>
      <td>
          <img src="<?= $item['logo_url'] ?>"
               alt="preview image"
               width="200"></td>
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
<div class="page-block">
    <div class="crud-footer crud-footer--between">
        <div class="table-info">
            <p>Сертификаты: 5/10</p>
        </div>
        
        <div class="table-control">
            <a href="/admin/content/certificates/create.php" class="btn btn--success btn--large">Создать</a>
        </div>
    </div>
</div>

<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>