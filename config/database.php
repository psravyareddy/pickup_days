<?php
class Database{

    private $host="oceanus.cse.buffalo.edu";
    private $dbUsername="********";
    private $dbPassword="********";
    private $dbName="***********";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->dbUsername,
             $this->dbPassword);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
    }

?>
