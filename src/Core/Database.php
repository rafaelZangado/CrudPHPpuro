<?php
namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getConnection(): PDO
    {
        if (!self::$instance) {
            $host = 'localhost';
            $dbname = 'digitro';
            $user = 'root';
            $pass = '12345678';

            try {
                self::$instance = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                    $user,
                    $pass
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
