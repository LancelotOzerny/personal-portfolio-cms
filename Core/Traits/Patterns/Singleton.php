<?php

namespace Core\Traits\Patterns;

trait Singleton
{
    private static self | null $instance;

    public static function getInstance() : self
    {
        if (!isset(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct() {}
    protected function __clone() {}
}