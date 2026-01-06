<?php

namespace Tables;

use Modules\Database\TableORM;

class SkillAreasTable extends TableORM
{
    protected string $tableName = 'skill_areas';

    protected function setTableParams(): void
    {
        $this->tableName = 'skill_areas';

        $this->addField('id', 'INT AUTO_INCREMENT PRIMARY KEY');
        $this->addField('name', 'VARCHAR(255) NOT NULL UNIQUE');
        $this->addField('description', 'varchar(255) NOT NULL');
    }
}