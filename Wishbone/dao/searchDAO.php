<?php
include_once 'server.php';
class SearchDAO{
    protected $mysqli;
    

    //	protected static $DB_HOST= "localhost";
    //	protected static $DB_USERNAME = "root";
    //	protected static $DB_PASSWORD = "";
    //	protected static $DB_DATABASE = "wishbone";
    
    function __construct(){
        try{
            $this->mysqli = new mysqli(Server::getDB_HOST(),Server::getDB_USERNAME(), Server::getDB_PASSWORD(), Server::getDB_DATABASE());
        }catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    
    public function getMysqli(){
        return $this->mysqli;
    }

}
?>