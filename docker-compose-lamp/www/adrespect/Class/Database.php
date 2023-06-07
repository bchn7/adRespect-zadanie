<?php
class Database  
{
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbName, $username, $password){
        
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        try{
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->username,$this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getPdo(){
        return $this->pdo;
    }
}




?>