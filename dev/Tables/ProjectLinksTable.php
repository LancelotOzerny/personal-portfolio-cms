<?php

namespace Tables;

use Modules\Database\TableORM;

class ProjectLinksTable extends TableORM
{
    protected function setTableParams() : void
    {
        $this->tableName = 'skill_links';

        $this->fields = [
            'id' => 'INT AUTO_INCREMENT PRIMARY KEY',
            'name' => 'VARCHAR(255) NOT NULL',
            'link' => 'VARCHAR(255) NOT NULL',
            'project_id' => 'INT NOT NULL',
        ];

        $this->addForeignKey(
            'fk_projects',
            'project_id',
            'projects',
            'id',
        );
    }

    public function create(): bool
    {
        if (empty($this->fields))
        {
            error_log("Ошибка: поля таблицы {$this->tableName} не определены.");
            return false;
        }

        $columns = [];
        foreach ($this->fields as $name => $definition)
        {
            $columns[] = '`' . $name . '` ' . $definition;
        }

        foreach ($this->foreignKeys as $fk)
        {
            $columns[] = $fk['constraint'];
        }

        $sql = sprintf(
            'CREATE TABLE IF NOT EXISTS `%s` (%s) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;',
            $this->tableName,
            implode(', ', $columns)
        );

        try
        {
            $this->pdo->exec($sql);
            return true;
        }
        catch (\PDOException $e)
        {
            error_log("<br/>❌ Ошибка создания таблицы {$this->tableName}:\n" . $e->getMessage());
            error_log("<br/>SQL-запрос: " . $sql);
            return false;
        }
    }
}