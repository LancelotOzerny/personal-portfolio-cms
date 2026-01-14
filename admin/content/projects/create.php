<?php
use Core\Modules\Forms\Validator;
use Core\Modules\Forms\FileUploader;
use Dev\Tables\ProjectsTable;
use Dev\Tables\ProjectLinksTable;

$errors = [];

if (isset($_POST['create'])) {
    $validator = new Validator();
    $rules = [
        'project-title' => ['string', ['min' => 1]],
        'project-preview-text' => ['string', ['min' => 1]],
        'project-text' => ['string'],
        'project-preview-image' => ['file', [
            'types' => ['image/png', 'image/jpeg', 'image/tiff', 'image/jpg', 'image/gif'],
            'size' => 5 * 1024 * 1024 // 5 МБ
        ]],
        'link-name-1' => ['string'],
        'link-url-1' => ['string'],
        'link-name-2' => ['string'],
        'link-url-2' => ['string'],
    ];

    $data = $_POST;
    $files = $_FILES;
    $data['project-preview-image'] = isset($files['project-preview-image']) ? $files['project-preview-image'] : null;

    $errors = $validator->validate($data, $rules);

    if (empty($errors)) {
        // Загрузка превью-изображения
        $imageUploader = new FileUploader($data['project-preview-image']);
        $imageSaved = $imageUploader->save('/uploads/content/projects/images');

        if ($imageSaved) {
            $projectsTable = new ProjectsTable();
            $projectLinksTable = new ProjectLinksTable();

            $imageUrl = '/uploads/content/projects/images/' . basename($imageUploader->saveName);

            // Вставка основного проекта
            $insertData = [
                'name' => htmlspecialchars($data['project-title']),
                'preview_text' => htmlspecialchars($data['project-preview-text']),
                'preview_image' => $imageUrl,
                'text' => htmlspecialchars($data['project-text'] ?? '')
            ];

            $projectId = $projectsTable->insert($insertData);

            if ($projectId) {
                // Вставка ссылок (если есть)
                $linksInserted = true;
                for ($i = 1; $i <= 2; $i++) {
                    if (!empty($data['link-name-' . $i]) && !empty($data['link-url-' . $i])) {
                        $linkData = [
                            'name' => htmlspecialchars($data['link-name-' . $i]),
                            'link' => htmlspecialchars($data['link-url-' . $i]),
                            'project_id' => $projectId
                        ];
                        if (!$projectLinksTable->insert($linkData)) {
                            $linksInserted = false;
                            break;
                        }
                    }
                }

                if ($linksInserted) {
                    header('Location: /admin/content/projects/');
                    exit;
                } else {
                    $errors['db'] = 'Ошибка сохранения ссылок в БД';
                }
            } else {
                $errors['db'] = 'Ошибка сохранения проекта в БД';
            }
        } else {
            $errors['files'] = $imageUploader->getErrors();
            if (!$imageSaved) unlink($imageUploader->fileInfo['tmp_name']);
        }
    }

    // Форматирование ошибок для вывода
    $formattedErrors = [];
    foreach ($errors as $field => $errs) {
        foreach ($errs as $err) {
            $formattedErrors[] = "$field: $err";
        }
    }
    $errors = $formattedErrors;
}

\Core\Modules\Main\Template::getInstance()->setTemplate('Admin');
\Core\Modules\Main\Template::getInstance()->showHeader();
?>

<form method="post" class="form" enctype="multipart/form-data">
    <p class="form__title">Новый проект</p>

    <?php if (!empty($errors)): ?>
        <div class="alert alert--danger">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="form__group">
        <label for="project-title">Название проекта</label>
        <input id="project-title"
               name="project-title"
               type="text"
               placeholder="Название проекта"
               value="<?= htmlspecialchars($_POST['project-title'] ?? '') ?>">
    </div>

    <div class="form__group">
        <label for="project-preview-text">Превью-текст</label>
        <textarea id="project-preview-text"
                  name="project-preview-text"
                  placeholder="Краткое описание проекта"
                  rows="3"><?= htmlspecialchars($_POST['project-preview-text'] ?? '') ?></textarea>
    </div>

    <div class="form__group">
        <label for="project-preview-image">Превью-изображение</label>
        <input id="project-preview-image"
               name="project-preview-image"
               type="file"
               accept="image/png, image/jpeg, image/tiff, image/jpg, image/gif">
    </div>

    <div class="form__group">
        <label for="project-text">Полное описание</label>
        <textarea id="project-text"
                  name="project-text"
                  placeholder="Подробное описание проекта"
                  rows="10"><?= htmlspecialchars($_POST['project-text'] ?? '') ?></textarea>
    </div>

    <div class="form__group">
        <label>Ссылки проекта</label>
        <?php for ($i = 1; $i <= 2; $i++): ?>
            <div class="link-group">
                <input type="text"
                       name="link-name-<?= $i ?>"
                       placeholder="Название ссылки"
                       value="<?= htmlspecialchars($_POST['link-name-' . $i] ?? '') ?>"
                       style="width: 45%; display: inline-block; margin-right: 10px;">
                <input type="url"
                       name="link-url-<?= $i ?>"
                       placeholder="URL ссылки"
                       value="<?= htmlspecialchars($_POST['link-url-' . $i] ?? '') ?>"
                       style="width: 45%; display: inline-block;">
            </div>
        <?php endfor; ?>
    </div>

    <div class="form__group">
        <div class="crud-footer">
            <div class="table-control">
                <input type="submit"
                       class="btn btn--success btn--large"
                       value="Создать"
                       name="create">
            </div>
        </div>
    </div>
</form>

<?php
\Core\Modules\Main\Template::getInstance()->showFooter();
?>
