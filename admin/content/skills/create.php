<?php
$errors = [];

if (isset($_POST['skill-create']))
{
    $name = htmlspecialchars($_POST['skill-name']);
    $description = htmlspecialchars($_POST['skill-description']);
    $progress = $_POST['skill-progress'];
    $areaId = $_POST['skill-group'];

    $logo = $_FILES['skill-logo'];

    $validator = new \Core\Modules\Forms\Validator();
    $data = [
        'name' => $name,
        'description' => $description,
        'progress' => $progress,
        'areaId' => $areaId,
    ];

    $rules = [
        'name' => [
            'string' => ['min' => 2, 'max' => 100],
        ],
        'description' => [
            'string' => ['max' => 255],
        ],
        'progress' => [
            'number' => ['min' => 0, 'max' => 100],
        ],
    ];
    $errors = $validator->validate($data, $rules);

    $skillByName = (new \Dev\Tables\SkillsTable)->getByName($name);
    if ($name && $skillByName)
    {
        $errors['name'][] = 'Навык с таким именем уже существует!';
    }

    if (empty($errors) && isset($_FILES['skill-logo']) && $_FILES['skill-logo']['error'] !== UPLOAD_ERR_NO_FILE)
    {
        $result = \Core\Modules\Forms\FileManager::createFile($logo, [
            'filter' => [
                'types' => ['image/jpg', 'image/jpeg', 'image/png'],
                'size' => 5 * 1024 * 1024
            ],
            'dir' => '/uploads/skills/',
        ]);

        if (is_array($result))
        {
            $errors['logo'] = $result;
        }
        else
        {
            $filePath = $result;
        }
    }

    if (empty($errors))
    {
        $fields = [
                'name' => $name,
                'description' => $description,
                'progress' => $progress,
        ];

        if ($areaId > 0) $fields['area_id'] = $areaId;
        if (isset($filePath)) $fields['logo'] = $filePath;

        (new \Dev\Tables\SkillsTable())->insert($fields);

        header('Location: /admin/content/skills/');
    }
}

$skillAreas = (new \Dev\Tables\SkillAreasTable())->getAll();
$skillAreas[] = [
    'id' => null,
    'name' => "Другое"
];

\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();

$certificates = [];
?>

<form method="post" class="form" enctype="multipart/form-data">
    <p class="form__title">Добавление навыка</p>

    <div class="form__group">
        <label for="skill-name">Название навыка</label>
        <input id="skill-name"
               name="skill-name"
               type="text"
               value="<?= $name ?? '' ?>"
               placeholder="Танцы с бубнами">
    </div>

    <?php if(empty($errors['name']) === false): ?>
        <div class="form__group">
            <?php foreach ($errors['name'] as $error): ?>
                <div class="alert alert--danger"><?= $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="skill-progress">Прогресс 50%</label>
        <input id="skill-progress"
               name="skill-progress"
               type="range"
               min="0%"
               max="100%"
               value="<?= $progress ?? '15%' ?>"
               placeholder="Разработка интегрированных систем">
    </div>

    <?php if(empty($errors['progress']) === false): ?>
        <div class="form__group">
            <?php foreach ($errors['progress'] as $error): ?>
                <div class="alert alert--danger"><?= $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="skill-logo">Preview Логотип\Картинка</label>
        <input id="skill-logo"
               name="skill-logo"
               type="file">

    </div>

    <?php if(empty($errors['logo']) === false): ?>
        <div class="form__group">
            <?php foreach ($errors['logo'] as $error): ?>
                <div class="alert alert--danger"><?= $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="skill-description">Короткое описание</label>
        <textarea id="skill-description"
                  name="skill-description"
                  rows="5"
                  placeholder="Вкратце опишите ваш уровень владения навыком"><?= $description ?? '' ?></textarea>
    </div>

    <?php if(empty($errors['description']) === false): ?>
        <div class="form__group">
            <?php foreach ($errors['description'] as $error): ?>
                <div class="alert alert--danger"><?= $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="skill-group">Группа</label>
        <select name="skill-group" id="skill-group">
            <?php foreach ($skillAreas as $skillArea): ?>
            <option <?= ($skillArea['id'] == ($areaId ?? 0) ? 'selected' : '') ?>
                    value="<?= $skillArea['id'] ?>"><?= $skillArea['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form__group crud-footer">
        <div class="table-control">
            <button type="submit" name="skill-create" class="btn btn--success btn--large">Создать</button>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
       let progressInput = document.getElementById('skill-progress');
        progressInput.addEventListener('input', (event) => {
           document.querySelector('label[for="skill-progress"]').innerText = 'Прогресс: ' + progressInput.value + '%';
       })
    });
</script>

<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>