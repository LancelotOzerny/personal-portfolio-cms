<?php
\Modules\Main\Template::getInstance()->setTemplate('Auth');
\Modules\Main\Template::getInstance()->showHeader();
?>
  <form class="form form-auth">
    <p class="form__title">Авторизация</p>
    <div class="form__group">
      <div class="alert alert--danger">Ошибка авторизации! Неправльный логин или пароль</div>
    </div>
    <div class="form__group">
      <label for="user-login">Логин</label>
      <input type="text" placeholder="Lancelot" id="user-login" name="user-login">
    </div>
    <div class="form__group">
      <label for="user-pass">Пароль</label>
      <input type="password" id="user-pass" name="user-pass">
    </div>
    <div class="form__group"><a class="btn btn--info btn--rounded" href="#">войти</a>
    </div>
  </form>
<?php
\Modules\Main\Template::getInstance()->showFooter();
?>