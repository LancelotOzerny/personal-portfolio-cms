<?php
$errors = [];

if (isset($_POST['certificate-create']))
{
    $data = [
        'title' => $_POST['certificate-title'],
        'name' => $_POST['certificate-name'],
        'date' => $_POST['certificate-date'],
        'additional' => $_POST['certificate-additional'],
        'theme' => $_POST['certificate-theme'],
        'logo' => $_FILES['certificate-logo'],
        'document' => $_FILES['certificate-document'],
    ];

    $filters = [
        'title' => [
            'string' => ['min' => 3, 'max' => 255],
        ],
        'name' => [
            'string' => ['min' => 3, 'max' => 255],
        ],
        'additional' => [
            'string' => ['min' => 3, 'max' => 255],
        ],
        'theme' => [
            'string' => ['min' => 3, 'max' => 255],
        ],
        'logo' => [
            'file' => [
                'types' => ['image/jpg', 'image/jpeg', 'image/png'],
                'size' => 5 * 1024 * 1024
            ],
        ],
        'document' => [
            'file' => [
                'types' => ['application/pdf', 'image/jpg', 'image/jpeg', 'image/png'],
                'size' => 5 * 1024 * 1024
            ],
        ],
    ];

    $validator = new \Core\Modules\Forms\Validator();
    $errors = $validator->validate($data, $filters);


    echo '<pre>';
    print_r($data);
    echo '</pre>';

    echo '<pre>';
    print_r($errors);
    echo '</pre>';
}


\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();
?>

<form method="post" class="form" enctype="multipart/form-data">
    <p class="form__title">Новый сертификат</p>

    <div class="form__group">
        <label for="certificate-title">Заголовок</label>
        <input id="certificate-title"
               name="certificate-title"
               type="text"
               placeholder="Разработчик PHP">
    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
        <div class="form__group">
            <?php foreach ($errors['title'] as $error): ?>
                <div class="alert alert--danger"><?= $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="certificate-name">Название сертификата</label>
        <input id="certificate-name"
               name="certificate-name"
               type="text"
               placeholder="Разработка интегрированных систем">
    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
    <div class="form__group">
        <?php foreach ($errors['title'] as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="certificate-logo">Preview Логотип\Картинка</label>
        <input id="certificate-logo"
               name="certificate-logo"
               type="file">
    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
    <div class="form__group">
        <?php foreach ($errors['title'] as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="certificate-date">Дата получения</label>
        <input id="certificate-date"
               name="certificate-date"
               type="date"
               placeholder="<?= date('DD.MM.YYYY') ?>">
    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
    <div class="form__group">
        <?php foreach ($errors['title'] as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="certificate-additional">Дополнительная информация</label>
        <input id="certificate-additional"
               name="certificate-additional"
               type="text"
               placeholder="Регистрационный номер: XXXX-XXX-XXXX-XX">
    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
    <div class="form__group">
        <?php foreach ($errors['title'] as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="certificate-theme">Модификатор цветовой схемы</label>
        <input id="certificate-theme"
               name="certificate-theme"
               type="text"
               value="white" src="/assets/images/1c-bitrix-logo.png">
    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
    <div class="form__group">
        <?php foreach ($errors['title'] as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="certificate-document">pdf сертификат, картинка сертификата</label>
        <input id="certificate-document"
               name="certificate-document"
               type="file">

    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
    <div class="form__group">
        <?php foreach ($errors['title'] as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="form__group">
        <div class="crud-footer">
            <div class="table-control">
                <input type="submit"
                       class="btn btn--success btn--large"
                       value="Создать"
                       name="certificate-create">
            </div>
        </div>
    </div>

    <?php if(isset($errors['title']) && count($errors['title']) > 0): ?>
    <div class="form__group">
        <?php foreach ($errors['title'] as $error): ?>
        <div class="alert alert--danger"><?= $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</form>

<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>