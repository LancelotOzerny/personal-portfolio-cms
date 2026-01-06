<?php

namespace Tables;

use Modules\Database\TableORM;

class ProjectsTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = 'projects';

        $this->fields = [
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'name' => 'VARCHAR(255) NOT NULL',
            'preview_text' => 'VARCHAR(255) NOT NULL',
            'preview_image' => 'VARCHAR(255) NOT NULL',
            'text' => 'TEXT',
        ];
    }
}