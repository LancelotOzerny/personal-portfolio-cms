<?php

namespace Core\Tables;

use Core\Modules\Database\TableORM;

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

    public function getByEmail(string $email) : array
    {
        return $this->getByParam('email', $email);
    }

    protected function getByParam(string $param, string $value): array
    {
        $sql = sprintf(
            'SELECT `%s`.*, `rights`.level FROM %s JOIN `rights` ON rights_id = `rights`.id WHERE `%s`.%s = :%s;',
            $this->tableName,
            $this->tableName,
            $this->tableName,
            $param,
            $param
        );

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':' . $param, $value, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch() ?: [];
    }
}