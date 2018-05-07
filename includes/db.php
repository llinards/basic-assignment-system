<?php

class Db
{
    private $hostname;
    private $username;
    private $password;
    private $database;

    protected function connect() {
  
        $this->hostname = "localhost";
        $this->username = "root";
        $this->password = "root";
        $this->database = "printful";

        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if ($conn->connect_error) die ($conn->connect_error);
        return $conn;
    }
}
?>