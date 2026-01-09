<?php
\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Modules\Main\Template::getInstance()->showHeader();
?>
<table class="crud-table">
<thead>
  <tr>
    <th>ID</th>
    <th>NickName</th>
    <th>Email</th>
    <th style="text-align: center;">Control</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>1</td>
    <td>Lancy</td>
    <td>lancelot.ozernuy@gmail.com</td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>1</td>
    <td>Lancy</td>
    <td>lancelot.ozernuy@gmail.com</td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>1</td>
    <td>Lancy</td>
    <td>lancelot.ozernuy@gmail.com</td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>1</td>
    <td>Lancy</td>
    <td>lancelot.ozernuy@gmail.com</td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
</tbody>
</table>
<div class="page-block">
<div class="table-info">
  <p>Пользователи: 5/10</p>
</div>
</div>

<?php
\Modules\Main\Template::getInstance()->showFooter();
?>