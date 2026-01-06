<?php

namespace Tables;

use Modules\Database\TableORM;

class ProjectsTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = 'projects';

        $this->addField('id', 'INT AUTO_INCREMENT PRIMARY KEY');
        $this->addField('name', 'VARCHAR(255) NOT NULL');
        $this->addField('preview_text', 'VARCHAR(255) NOT NULL');
        $this->addField('preview_image', 'VARCHAR(255) NOT NULL');
        $this->addField('text', 'TEXT');
    }
}