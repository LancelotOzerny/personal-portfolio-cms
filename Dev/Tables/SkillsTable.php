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
        $this->addField('area_id', 'INT DEFAULT NULL');

        $this->addForeignKey(
            'fk_skill_area',
            'area_id',
            'skill_areas',
            'id'
        );
    }

    public function getByName(string $name): array
    {
        return $this->getByParam('name', $name);
    }

    public function getWithAreas() : array
    {
        $sql = sprintf(
            'SELECT `%s`.*, `skill_areas`.name as `area_name`, `skill_areas`.description as `area_description` 
                    FROM %s 
                    LEFT JOIN `skill_areas` ON `skill_areas`.id = area_id',
            $this->tableName,
            $this->tableName,
        );
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll() ?? [];
    }
}