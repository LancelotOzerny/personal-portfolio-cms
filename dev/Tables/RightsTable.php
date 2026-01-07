<?php

namespace Tables;

use Modules\Database\TableORM;

class RightsTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = "rights";

        $this->addField('id', 'INT PRIMARY KEY AUTO_INCREMENT');
        $this->addField('name', 'VARCHAR(100) UNIQUE');
        $this->addField('level', 'VARCHAR(100) NOT NULL');
    }
}