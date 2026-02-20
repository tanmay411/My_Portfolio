<?php

namespace App\Bin;

class Db
{
    private \PDO $db;
    public function __construct()
    {
        // Database configuration
        $host = 'localhost';       // or your DB server
        $db = 'newpro';   // database name
        $user = 'root';   // database username
        $pass = '';   // database password
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            // Create PDO instance
            $this->db = new \PDO($dsn, $user, $pass);

            // Set error mode to exception for better debugging
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e) {
            // Handle connection error
            echo "❌ Connection failed: " . $e->getMessage();
            exit;
        }


    }
    public function getDB()
    {
        return $this->db;
    }
}