<?php

namespace Core\Modules\Forms;

class Validator
{
    private $errors = [];

    public function validate(array $data, array $rules): array
    {
        $this->errors = [];

        foreach ($rules as $field => $fieldRules)
        {
            if (!array_key_exists($field, $data))
            {
                continue;
            }

            $value = $data[$field];

            foreach ($fieldRules as $rule => $param)
            {
                switch ($rule) {
                    case 'string':
                        $this->validateString($field, $value, $param);
                        break;
                    case 'number':
                        $this->validateNumber($field, $value, $param);
                        break;
                    case 'email':
                        $this->validateEmail($field, $value);
                        break;
                    case 'file':
                        $this->validateFile($field, $value, $param);
                        break;
                }
            }
        }

        return $this->errors;
    }

    private function validateString(string $field, $value, array $params = [])
    {
        if (!is_string($value)) {
            $this->errors[$field][] = 'Значение должно быть строкой';
            return;
        }

        $minLength = $params['min'] ?? 0;
        $maxLength = $params['max'] ?? null;

        if (strlen($value) < $minLength) {
            $this->errors[$field][] = "Длина строки должна быть не менее $minLength символов";
        }

        if ($maxLength !== null && strlen($value) > $maxLength) {
            $this->errors[$field][] = "Длина строки не должна превышать $maxLength символов";
        }
    }

    private function validateNumber(string $field, $value, array $params = [])
    {
        if (!is_numeric($value)) {
            $this->errors[$field][] = 'Значение должно быть числом';
            return;
        }

        $min = $params['min'] ?? null;
        $max = $params['max'] ?? null;

        if ($min !== null && $value < $min) {
            $this->errors[$field][] = "Значение должно быть не меньше $min";
        }

        if ($max !== null && $value > $max) {
            $this->errors[$field][] = "Значение должно быть не больше $max";
        }
    }

    private function validateEmail(string $field, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = 'Некорректный email-адрес';
        }
    }

    private function validateFile(string $field, $file, array $params = [])
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            $this->errors[$field][] = 'Ошибка загрузки файла';
            return;
        }

        $allowedTypes = $params['types'] ?? [];
        $maxSize = $params['size'] ?? null;

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!empty($allowedTypes) && !in_array($mimeType, $allowedTypes)) {
            $this->errors[$field][] = 'Недопустимый тип файла';
        }

        if ($maxSize !== null && $file['size'] > $maxSize) {
            $this->errors[$field][] = "Файл слишком большой (максимум $maxSize байт)";
        }
    }
}