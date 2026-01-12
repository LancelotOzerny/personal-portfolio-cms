<?php

namespace Core\Modules\Forms;

use Core\Modules\Main\Application;

class FileManager
{
    public static function createFile($file, $params) : string | array
    {
        if (isset($params['filter']))
        {
            $validator = new \Core\Modules\Forms\Validator();
            $errors = $validator->validate(
                ['user_file' => $file],
                [
                    'user_file' => [
                        'file' => $params['filter']
                    ]
                ]
            );

            if (count($errors) > 0)
            {
                return $errors['user_file'];
            }
        }

        $dir = $params['dir'] ?? '/uploads/';

        $extension = image_type_to_extension(exif_imagetype($file['tmp_name']), false);
        $new_name = uniqid() . '.' . $extension;

        $folderPath = Application::getInstance()->rootPath . $dir;
        if (!is_dir($folderPath))
        {
            mkdir($folderPath, 0777, true);
        }

        $destination = "$folderPath/$new_name";

        if (move_uploaded_file($file['tmp_name'], $destination) === false)
        {
            return ['Не удалось сохранить файл'];
        }

        return $dir . '/' . $new_name;
    }
}