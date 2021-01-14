<?php
class Database
{
    // Properties
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database;

    private $conn;

    // Methods
    public function set_database($database)
    {
        $this->database = $database;
    }
    public function create_connection()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
    }
    public function check_status()
    {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            echo "Success";
        }
    }
}

$fr = new Database();
$fr->set_database("dev");
$fr->create_connection();
$fr->check_status();