<?php

mysqli_report(MYSQLI_REPORT_STRICT);

class AbstractDAO{
	protected $mysqli;
    
    protected static $DB_HOST= "localhost";
	protected static $DB_USERNAME = "root";
	protected static $DB_PASSWORD = "root";
	protected static $DB_DATABASE = "wishbone";
	
	function __construct(){
		try{
			$this->mysqli = new mysqli(self::$DB_HOST,self::$DB_USERNAME, self::$DB_PASSWORD, self::$DB_DATABASE);
		}catch(mysqli_sql_exception $e){
			throw $e;
		}
			
	}
	
	public function getMysqli(){
		return $this->mysqli;	
	}
}
?>