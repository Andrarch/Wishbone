<?php
class abstractDAO {
    protected $db;
    
    function __construct(){
        $this->db= new mysqli('localhost', 'root', '', 'wishbone');
    }
    
  
}


?>