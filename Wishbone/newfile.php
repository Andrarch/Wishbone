<?php
include_once 'server.php';
class abstractDAO {
    protected $db;
    
    function __construct(){
        $this->db= new mysqli(Server::getDB_HOST(), Server::getDB_USERNAME(), Server::getDB_PASSWORD(), Server::getDB_DATABASE());
    }
    
  
}


?>