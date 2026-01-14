<?php
use Core\Modules\Forms\Validator;
use Core\Modules\Forms\FileUploader;
use Dev\Tables\CertificatesTable;

$errors = [];

if (isset($_POST['create']))
{
    $validator = new Validator();
    $rules = [
            'certificate-title' => ['string', ['min' => 1]],
            'certificate-name' => ['string', ['min' => 1]],
            'certificate-date' => ['string', ['min' => 10]],
            'certificate-additional' => ['string'],
            'certificate-theme' => ['string'],
            'certificate-logo' => ['file', ['types' => ['image/png', 'image/jpeg', 'image/tiff', 'image/jpg', 'image/gif']]],
            'certificate-document' => ['file', ['required' => true, 'types' => ['application/pdf', 'image/png', 'image/jpeg', 'image/tiff', 'image/jpg', 'image/gif']]]
    ];

    $data = $_POST;
    $files = $_FILES;
    $data['certificate-logo'] = isset($files['certificate-logo']) ? $files['certificate-logo'] : null;
    $data['certificate-document'] = $files['certificate-document'];

    $errors = $validator->validate($data, $rules);

    if (empty($errors))
    {
        $documentUploader = new FileUploader($data['certificate-document']);
        $logoUploader = isset($data['certificate-logo']) && $data['certificate-logo']['error'] === UPLOAD_ERR_OK ? new FileUploader($data['certificate-logo']) : null;

        $docSaved = $documentUploader->save('/uploads/content/certificates/docs');
        $logoSaved = $logoUploader ? $logoUploader->save('/uploads/content/certificates/images') : true;

        if ($docSaved && $logoSaved)
        {
            $certTable = new CertificatesTable();
            $logoUrl = $logoUploader ? '/uploads/content/certificates/images/' . basename($logoUploader->saveName) : '';
            $docUrl = '/uploads/content/certificates/docs/' . basename($documentUploader->saveName);

            $insertData = [
                    'title' => htmlspecialchars($data['certificate-title']),
                    'name' => htmlspecialchars($data['certificate-name']),
                    'date' => $data['certificate-date'],
                    'additional' => htmlspecialchars($data['certificate-additional'] ?? ''),
                    'logo_url' => $logoUrl,
                    'theme' => htmlspecialchars($data['certificate-theme']),
                    'document_url' => $docUrl
            ];

            if ($certTable->insert($insertData))
            {
                header('Location: /admin/content/certificates/');
                exit;
            }
            else
            {
                $errors['db'] = 'Ошибка сохранения в БД';
            }
        }
        else
        {
            $errors['files'] = array_merge($documentUploader->getErrors(), $logoUploader?->getErrors() ?? []);

            if (!$docSaved) unlink($documentUploader->fileInfo['tmp_name']);
            if ($logoUploader && !$logoSaved) unlink($logoUploader->fileInfo['tmp_name']);
        }
    }

    foreach ($errors as $field => $errs)
    {
        foreach ($errs as $err)
        {
            $errors[] = "$field: $err";
        }
    }
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
               placeholder="Разработчик PHP"
               value="<?= htmlspecialchars($_POST['certificate-title'] ?? '') ?>">
    </div>

    <div class="form__group">
        <div class="alert alert--danger">Тестовая ошибка</div>
    </div>

    <div class="form__group">
        <label for="certificate-name">Название сертификата</label>
        <input id="certificate-name"
               name="certificate-name"
               type="text"
               placeholder="Разработка интегрированных систем"
               value="<?= htmlspecialchars($_POST['certificate-name'] ?? '') ?>">
    </div>


    <div class="form__group">
        <label for="certificate-logo">Preview Логотип/Картинка</label>
        <input id="certificate-logo"
               name="certificate-logo"
               type="file">
    </div>

    <div class="form__group">
        <label for="certificate-date">Дата получения</label>
        <input id="certificate-date"
               name="certificate-date"
               type="date"
               value="<?= htmlspecialchars($_POST['certificate-date'] ?? '') ?>">
    </div>

    <div class="form__group">
        <label for="certificate-additional">Дополнительная информация</label>
        <input id="certificate-additional"
               name="certificate-additional"
               type="text"
               placeholder="Регистрационный номер: XXXX-XXX-XXXX-XX"
               value="<?= htmlspecialchars($_POST['certificate-additional'] ?? '') ?>">
    </div>

    <div class="form__group">
        <label for="certificate-theme">Модификатор цветовой схемы</label>
        <input id="certificate-theme"
               name="certificate-theme"
               type="text"
               value="<?= htmlspecialchars($_POST['certificate-theme'] ?? 'white') ?>">
    </div>


    <div class="form__group">
        <label for="certificate-document">PDF сертификат или изображение</label>
        <input id="certificate-document"
               name="certificate-document"
               type="file">
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