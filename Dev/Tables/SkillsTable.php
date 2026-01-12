<?php

namespace Dev\Tables;

use Core\Modules\Database\TableORM;

class SkillsTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = 'skills';

        $this->addField('id', 'INT AUTO_INCREMENT PRIMARY KEY');
        $this->addField('name', 'VARCHAR(255) NOT NULL UNIQUE');
        $this->addField('logo', 'VARCHAR(255)');
        $this->addField('description', 'TEXT');
        $this->addField('progress', 'INT(3)');
        $this->addField('area_id', 'INT NOT NULL');

        $this->addForeignKey(
            'fk_skill_area',
            'area_id',
            'skill_areas',
            'id'
        );
    }
}