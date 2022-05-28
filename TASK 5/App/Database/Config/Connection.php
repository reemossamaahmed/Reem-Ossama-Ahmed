<?php

namespace App\Database\Config;

class Connection{
    private string $dbhost     = "localhost";
    private string $dbusername = "root";
    private string $dbpassword = "";
    private string $dbname     = "e-commerce";
    public \mysqli $conn;
    public function __construct()
    {
        $this->conn = new \mysqli($this->dbhost,$this->dbusername,$this->dbpassword,$this->dbname);
    }
    public function __destruct()
    {
        $this->conn->close();
    }
}
