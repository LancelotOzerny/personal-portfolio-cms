<?php
\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();

$certificates = [];
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
  <tr>
    <td>1</td>
    <td>Сертификат 1</td>
    <td>
      <p>  "Информационные системы и технологии"</p>
      <p>  Дата выдачи: 28-12-25</p>
      <p>  Рег. код: XXSSF-GASDF-DFSAD-ASSSDF</p>
    </td>
    <td><img src="https://avatars.mds.yandex.net/i?id=e107f6bd131349ef24428c08a5473a9a_l-5008643-images-thumbs&amp;n=13" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>2</td>
    <td>Сертификат 2</td>
    <td>
      <p>  "Информационные системы и технологии"</p>
      <p>  Дата выдачи: 28-12-25</p>
      <p>  Рег. код: XXSSF-GASDF-DFSAD-ASSSDF</p>
    </td>
    <td><img src="https://avatars.mds.yandex.net/i?id=e107f6bd131349ef24428c08a5473a9a_l-5008643-images-thumbs&amp;n=13" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>3</td>
    <td>Сертификат 3</td>
    <td>
      <p>  "Информационные системы и технологии"</p>
      <p>  Дата выдачи: 28-12-25</p>
      <p>  Рег. код: XXSSF-GASDF-DFSAD-ASSSDF</p>
    </td>
    <td><img src="https://avatars.mds.yandex.net/i?id=e107f6bd131349ef24428c08a5473a9a_l-5008643-images-thumbs&amp;n=13" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>4</td>
    <td>Сертификат 4</td>
    <td>
      <p>  "Информационные системы и технологии"</p>
      <p>  Дата выдачи: 28-12-25</p>
      <p>  Рег. код: XXSSF-GASDF-DFSAD-ASSSDF</p>
    </td>
    <td><img src="https://avatars.mds.yandex.net/i?id=e107f6bd131349ef24428c08a5473a9a_l-5008643-images-thumbs&amp;n=13" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>5</td>
    <td>Сертификат 5</td>
    <td>
      <p>  "Информационные системы и технологии"</p>
      <p>  Дата выдачи: 28-12-25</p>
      <p>  Рег. код: XXSSF-GASDF-DFSAD-ASSSDF</p>
    </td>
    <td><img src="https://avatars.mds.yandex.net/i?id=e107f6bd131349ef24428c08a5473a9a_l-5008643-images-thumbs&amp;n=13" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
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