<?php
include_once("dao/server.php");

class Database
{
    protected $DBH = null;
    
    public function __construct($dbname, $username, $password, $port = 3306, $host = "localhost", $charset = "utf8")
    {
        $this->DBH = new PDO(
            sprintf("mysql:host=%s;port=%d;dbname=%s;charset=%s",Server::getDB_HOST(), $port, Server::getDB_DATABASE(), $charset ),
            Server::getDB_USERNAME(),
            Server::getDB_PASSWORD()
            ); 
    }
    
    public function select($query, ...$placeholders)
    {
        $sth = $this->execute($query, $placeholders);
        
        return $sth->fetchAll();
    }
    
    public function selectOne($query, ...$placeholders)
    {
        $sth = $this->execute($query, $placeholders);
        
        return $sth->fetch();
    }
    
    public function insert($query, ...$placeholders)
    {
        $sth = $this->execute($query, $placeholders);
        
        return $sth->rowCount();
    }
    
    public function lastInsertId()
    {
        return $this->DBH->lastInsertId();
    }
    
    public function update($query, ...$placeholders)
    {
        $sth = $this->execute($query, $placeholders);
        
        return $sth->rowCount();
    }
    
    public function delete($query, ...$placeholders)
    {
        $sth = $this->execute($query, $placeholders);
        
        return $sth->rowCount();
    }
    
    protected function execute($query, $placeholders)
    {
        $sth = $this->DBH->prepare($query);
        $sth->execute($placeholders);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        
        return $sth;
    }
}