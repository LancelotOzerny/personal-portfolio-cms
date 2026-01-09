<?php
\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Modules\Main\Template::getInstance()->showHeader();
?>
<table class="crud-table">
<thead>
  <tr>
    <th>ID</th>
    <th width="200">Название</th>
    <th>Короткое описание</th>
    <th>preview image</th>
    <th style="text-align: center;">Control</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>1</td>
    <td>Проект номер 1</td>
    <td>lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar</td>
    <td><img src="https://img.freepik.com/premium-photo/top-down-view-team-compare-blueprint-house-plan-alimentation_31965-415974.jpg?semt=ais_hybrid&amp;w=740" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>2</td>
    <td>Проект номер 2</td>
    <td>lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar</td>
    <td><img src="https://img.freepik.com/premium-photo/top-down-view-team-compare-blueprint-house-plan-alimentation_31965-415974.jpg?semt=ais_hybrid&amp;w=740" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>3</td>
    <td>Проект номер 3</td>
    <td>lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar</td>
    <td><img src="https://img.freepik.com/premium-photo/top-down-view-team-compare-blueprint-house-plan-alimentation_31965-415974.jpg?semt=ais_hybrid&amp;w=740" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>4</td>
    <td>Проект номер 4</td>
    <td>lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar</td>
    <td><img src="https://img.freepik.com/premium-photo/top-down-view-team-compare-blueprint-house-plan-alimentation_31965-415974.jpg?semt=ais_hybrid&amp;w=740" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
  <tr>
    <td>5</td>
    <td>Проект номер 5</td>
    <td>lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar lorem ipsum emmet dollar</td>
    <td><img src="https://img.freepik.com/premium-photo/top-down-view-team-compare-blueprint-house-plan-alimentation_31965-415974.jpg?semt=ais_hybrid&amp;w=740" alt="preview image" width="200"></td>
    <td>
      <div class="crud-table__control"><a class="btn btn--squire btn--info btn--rounded&amp;#10006;" href="#">&#128736;</a><a class="btn btn--squire btn--danger btn--rounded&amp;#10006;" href="#">&#10006;</a>
      </div>
    </td>
  </tr>
</tbody>
</table>
<div class="page-block">
<div class="table-info">
  <p>Проекты: 5/10</p>
</div>
</div>

<?php
\Modules\Main\Template::getInstance()->showFooter();
?>