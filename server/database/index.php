<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public static Capsule $capsule;

    public static function init(): void
    {
        self::$capsule = new Capsule();

        self::$capsule->addConnection([
            'driver' => $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
        ]);

        self::$capsule->setAsGlobal();
        self::$capsule->bootEloquent();
    }
}
