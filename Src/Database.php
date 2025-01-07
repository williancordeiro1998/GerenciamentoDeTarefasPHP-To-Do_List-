<?php

namespace Src;

use PDO;
use PDOException;

class Database {
    private static $connection;

    public static function getConnection() {
        if (!self::$connection) {
            $dotenv = parse_ini_file(__DIR__ . '/../.env');
            try {
                self::$connection = new PDO($dotenv['DB_DSN'], $dotenv['DB_USER'], $dotenv['DB_PASS']);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
?>
