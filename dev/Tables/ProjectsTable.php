<?php

namespace Dev\Tables;

use Core\Modules\Database\TableORM;

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

    public function getWithLinks() : array
    {
        $sql = ' SELECT
            p.id AS project_id,
            p.id AS project_id,
            p.name AS project_name,
            p.preview_text,
            p.preview_image,
            p.text,
            l.id AS link_id,
            l.name AS link_name,
            l.link AS link_url
        FROM projects p
        LEFT JOIN project_links l ON p.id = l.project_id
        ORDER BY p.id, l.id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $arrList = $stmt->fetchAll() ?: null;

        $result = [];
        foreach ($arrList ?? [] as $proj)
        {
            $index = $proj['project_id'];

            if (isset($result[$index]))
            {
                $result[$index]['links'][] = [
                    'id' => $proj['link_id'],
                    'name' => $proj['link_name'],
                    'url' => $proj['link_url'],
                ];
                continue;
            }

            $result[$index] = [
                'id' => $proj['project_id'],
                'name' => $proj['project_name'],
                'preview_text' => $proj['preview_text'],
                'preview_image' => $proj['preview_image'],
                'text' => $proj['text'],
                'links' => [],
            ];

            $result[$index]['links'][] = [
                'id' => $proj['link_id'],
                'name' => $proj['link_name'],
                'url' => $proj['link_url'],
            ];
        }

        return $result;
    }
}