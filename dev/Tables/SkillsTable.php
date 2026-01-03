<?php

namespace Tables;

use Modules\Database\TableORM;

class SkillsTable extends TableORM
{
    protected string $tableName = 'skills';

    protected array $fields = [
        'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
        'name' => 'VARCHAR(255) NOT NULL UNIQUE',
        'progress' => 'INT(3)',
        'skill_area_id' => 'INT NOT NULL,
                     CONSTRAINT fk_skill_area FOREIGN KEY (skill_area_id)
                     REFERENCES skill_areas (id) ON DELETE RESTRICT ON UPDATE CASCADE',
    ];
}