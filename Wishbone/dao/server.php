<?php
class Server {
//     protected static $DB_HOST= "sql210.epizy.com";
//     protected static $DB_USERNAME = "epiz_23713276";
//     protected static $DB_PASSWORD = "tx1CkTlFKPmbg6";
//     protected static $DB_DATABASE = "epiz_23713276_Wishbone";
   
//     protected static $DB_HOST= "sql201.byethost.com";
//     protected static $DB_USERNAME = "b5_23734857";
//     protected static $DB_PASSWORD = "wishboneP@55word";
//     protected static $DB_DATABASE = "b5_23734857_wishbone";
    
    
    
    protected static $DB_HOST= "localhost";
    protected static $DB_USERNAME = "root";
    protected static $DB_PASSWORD = "";
    protected static $DB_DATABASE = "wishbone";
    /**
     * @return string
     */
    public static function getDB_HOST()
    {
        return Server::$DB_HOST;
    }

    /**
     * @return string
     */
    public static function getDB_USERNAME()
    {
        return Server::$DB_USERNAME;
    }

    /**
     * @return string
     */
    public static function getDB_PASSWORD()
    {
        return Server::$DB_PASSWORD;
    }

    /**
     * @return string
     */
    public static function getDB_DATABASE()
    {
        return Server::$DB_DATABASE;
    }

    
    
    
}


?>