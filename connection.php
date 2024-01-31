<?php
    class Connection {
        protected $conn;

        public function __construct() {
            $host = "localhost";
            $root = "root";
            $root_password = "";
            $db = 'db_test';

            $dbh = new PDO("mysql:host=$host", $root, $root_password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec("CREATE DATABASE IF NOT EXISTS $db");
            $this->conn = new PDO("mysql:host=$host;dbname=$db;port=3306", $root, $root_password);
            $this->conn->exec("CREATE TABLE IF NOT EXISTS users (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(30),
                email VARCHAR(30)
            )");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function getConn() {
            return $this->conn;
        }
    }
?>