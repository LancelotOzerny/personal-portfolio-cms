<?php
$errors = [];

if (isset($_SESSION['is_authorised']))
{
    header('Location: /admin/');
}

/* AUTHORISE */
if (isset($_POST['authorise']) && $_POST['authorise'])
{
    $email = $_POST['user-email'] ?? '';
    $password = $_POST['user-pass'] ?? '';

    $user = (new \Core\Tables\UsersTable())->getByEmail($email);

    if (empty($email) || empty($password))
    {
        $errors[] = 'Пустой логин или пароль';
        exit;
    }

    if ($user && password_verify($password, $user['password']))
    {
        $_SESSION['is_authorised'] = true;
        $_SESSION['login-id'] = $user['id'];
        $_SESSION['login-time'] = time();

        header('Location: /admin/');
        echo 'redirected';
        exit;
    }

    $errors[] = 'Неверный логин или пароль';
}

/* SITE TEMPLATE*/
\Core\Modules\Main\Template::getInstance()->setTemplate('Auth');
\Core\Modules\Main\Template::getInstance()->showHeader();
?>
  <form class="form form-auth" method="post">
    <p class="form__title">Авторизация</p>
    <?php if($errors): ?>
    <div class="form__group">
        <?php foreach ($errors as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="form__group">
      <label for="user-email">Ваш Email:</label>
      <input type="text" placeholder="example@example.com" id="user-email" name="user-email" value="<?= $email ?? '' ?>">
    </div>
    <div class="form__group">
      <label for="user-pass">Пароль</label>
      <input type="password" id="user-pass" name="user-pass">
    </div>
    <div class="form__group">
        <input type="submit"
               class="btn btn--info btn--rounded"
               name="authorise"
               value="войти">
    </div>
  </form>
<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>