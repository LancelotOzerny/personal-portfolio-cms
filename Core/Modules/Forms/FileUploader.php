<?php
namespace Core\Modules\Forms;

use Core\Modules\Main\Application;

class FileUploader
{
    public readonly string $extension;
    public readonly string $saveName;
    public readonly array $fileInfo;
    private array $errors = [];


    public function __construct(array $fileInfo)
    {
        if (empty($fileInfo) || is_uploaded_file($fileInfo['tmp_name'] === false))
        {
            $this->errors[] = 'Файл не загружен!';
        }

        $this->fileInfo = $fileInfo;
        $this->extension = mb_split('/', $this->fileInfo['type'])[1];
        $this->saveName = uniqid() . '.' . $this->extension;
    }

    public function save($dir = '/uploads') : bool
    {
        if (!is_dir($folderPath = Application::getInstance()->rootPath . '/' . $dir))
        {
            mkdir($folderPath, 0777, true);
        }

        $destination = $folderPath . '/' . $this->saveName;

        if (move_uploaded_file($this->fileInfo['tmp_name'], $destination) === false)
        {
            $this->errors[] = 'Не удалось сохранить файл';
            return false;
        }

        return true;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}