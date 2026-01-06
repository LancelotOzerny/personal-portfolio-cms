<?php

namespace Tables;

use Modules\Database\TableORM;

class ProjectLinksTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = 'project_links';

        $this->addField('id', 'INT AUTO_INCREMENT PRIMARY KEY');
        $this->addField('name', 'VARCHAR(255) NOT NULL');
        $this->addField('link', 'VARCHAR(255) NOT NULL');
        $this->addField('project_id', 'INT NOT NULL');

        $this->addForeignKey(
            'fk_projects',
            'project_id',
            'projects',
            'id',
        );
    }
}