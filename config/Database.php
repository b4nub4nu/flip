<?php
class Database {
    private $conn;
 
    // connection to database
    public function connect() {
        define("DB_HOST", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "root"); // change your password database
        define("DB_DATABASE", "flip"); 
         
        // connection to mysql database
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
         
        // return database handler
        return $this->conn;
    }
}
 
?>