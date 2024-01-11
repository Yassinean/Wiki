<?php
class Db
{
    private static $connection;

    public function __construct()
    {
        // Private constructor to prevent creating multiple instances
    }

    public static function connect()
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=localhost;dbname=wiki", "root", "");
                self::$connection->exec("set names utf8");
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Log or handle the exception as needed
                throw new Exception("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}

// Example of usage:
try {
    $connection = Db::connect();
    // Connection successful
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


ini_set('session.cookie_lifetime', false);
session_start();

define('PATH_REQUIRE', substr($_SERVER['SCRIPT_FILENAME'], 0, -9)); // inclusion php
define('PATH', substr($_SERVER['PHP_SELF'], 0, -9)); // pour les images et les fichiers
define('__ROOT__', dirname(dirname(__FILE__)));