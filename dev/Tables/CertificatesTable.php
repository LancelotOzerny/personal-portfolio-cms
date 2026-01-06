<?php

namespace Tables;

use Modules\Database\TableORM;

class CertificatesTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = 'certificates';

        $this->addField('id', 'INT AUTO_INCREMENT PRIMARY KEY');
        $this->addField('title', 'VARCHAR(255) NOT NULL');
        $this->addField('name', 'VARCHAR(255) NOT NULL');
        $this->addField('date', 'DATE NOT NULL');
        $this->addField('additional', 'VARCHAR(255)');
        $this->addField('logo', 'VARCHAR(255)');
        $this->addField('theme', 'TINYTEXT DEFAULT NULL');
        $this->addField('download_link', 'VARCHAR(255) NOT NULL');
    }
}