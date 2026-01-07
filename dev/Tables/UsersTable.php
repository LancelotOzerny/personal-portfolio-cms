<?php

namespace Tables;

use Modules\Database\TableORM;

class UsersTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = "users";

        $this->addField('id', 'INT AUTO_INCREMENT PRIMARY KEY');
        $this->addField('nickname', 'VARCHAR(100) NOT NULL');
        $this->addField('email', 'VARCHAR(255) NOT NULL');
        $this->addField('password', 'VARCHAR(255) NOT NULL');
        $this->addField('rights_id', 'INT NOT NULL DEFAULT 2');

        $this->addForeignKey('rights_fk', 'rights_id', 'rights', 'id');
    }
}