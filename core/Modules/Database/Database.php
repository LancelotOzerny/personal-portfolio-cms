<?php

namespace Modules\Database;

use Modules\Main\Application;

class Database
{
    private static ?Database $instance = null;
    private \PDO $pdo;

    protected function getDatabaseConfig(): array
    {
        $config = require_once Application::getInstance()->rootPath . '/config/config.php';

        return $config['database'];
    }

    private function __construct()
    {
        $config = $this->getDatabaseConfig();
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['dbname'],
            $config['charset']
        );

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new \PDO($dsn, $config['user'], $config['password'], $options);
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getPdo(): \PDO
    {
        return $this->pdo;
    }
}
