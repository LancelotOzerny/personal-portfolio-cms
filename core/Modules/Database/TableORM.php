<?php

namespace Modules\Database;

abstract class TableORM
{
    protected \PDO $pdo;
    protected string $tableName;
    protected array $fields;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getPdo();
    }

    public function create(): bool
    {
        if (empty($this->fields)) {
            error_log("Ошибка: поля таблицы {$this->tableName} не определены.");
            return false;
        }

        $columns = [];
        foreach ($this->fields as $name => $definition)
        {
            $columns[] = '`' . $name . '` ' . $definition;
        }

        $sql = sprintf(
            'CREATE TABLE IF NOT EXISTS `%s` (%s) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;',
            $this->tableName,
            implode(', ', $columns)
        );

        try {
            $this->pdo->exec($sql);
            echo "<br/>✓ Таблица {$this->tableName} создана успешно.\n";
            return true;
        } catch (\PDOException $e) {
            error_log("<br/>❌ Ошибка создания таблицы {$this->tableName}:\n" . $e->getMessage());
            error_log("<br/>SQL-запрос: " . $sql);
            return false;
        }
    }


    public function delete(): bool
    {
        $sql = sprintf('DROP TABLE IF EXISTS `%s`;', $this->tableName);

        try
        {
            $this->pdo->exec($sql);
            return true;
        }
        catch (\PDOException $e)
        {
            error_log('Ошибка удаления таблицы: ' . $e->getMessage());
            return false;
        }
    }

    public function insert(array $data): int|false
    {
        $columns = array_keys($data);
        $placeholders = array_map(fn($col) => ':' . $col, $columns);

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $this->tableName,
            implode(', ', $columns),
            implode(', ', $placeholders)
        );

        $stmt = $this->pdo->prepare($sql);

        try
        {
            $stmt->execute($data);
            return (int)$this->pdo->lastInsertId();
        }
        catch (\PDOException $e)
        {
            error_log('Ошибка вставки: ' . $e->getMessage());
            return false;
        }
    }

    public function find(int $id): ?array
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id', $this->tableName);
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch() ?: null;
    }

    public function update(int $id, array $data): bool
    {
        $setParts = array_map(fn($col) => "`$col` = :$col", array_keys($data));
        $sql = sprintf(
            'UPDATE %s SET %s WHERE id = :id',
            $this->tableName,
            implode(', ', $setParts)
        );

        $data['id'] = $id;

        $stmt = $this->pdo->prepare($sql);

        try
        {
            $stmt->execute($data);
            return $stmt->rowCount() > 0;
        }
        catch (\PDOException $e)
        {
            error_log('Ошибка обновления: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteById(int $id): bool
    {
        $sql = sprintf('DELETE FROM %s WHERE id = :id', $this->tableName);
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);

        try
        {
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }
        catch (\PDOException $e) {
            error_log('Ошибка удаления: ' . $e->getMessage());
            return false;
        }
    }
}
