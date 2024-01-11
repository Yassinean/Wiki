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
