<?php

namespace Tables;

use Modules\Database\TableORM;

class SkillAreasTable extends TableORM
{
    protected string $tableName = 'skill_areas';

    protected array $fields = [
        'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
        'name' => 'VARCHAR(255) NOT NULL UNIQUE',
        'description' => 'TEXT'
    ];
}