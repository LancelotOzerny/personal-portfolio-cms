<?php

namespace Tables;

use Modules\Database\TableORM;

class SkillsTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = 'skills';

        $this->fields = [
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'name' => 'VARCHAR(255) NOT NULL UNIQUE',
            'progress' => 'INT(3)',
            'area_id' => 'INT NOT NULL',
        ];

        $this->addForeignKey(
            'fk_skill_area',
            'area_id',
            'skill_areas',
            'id'
        );
    }
}