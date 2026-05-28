<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "koneksi_dbphp";
    public $con;

    public function getConnection() {
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->con->connect_error) {
            die("Koneksi gagal: " . $this->con->connect_error);
        }
        
        return $this->con;
    }
}
?>