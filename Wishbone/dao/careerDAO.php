<?php
require_once('abstractDAO.php');
require_once('./model/career.php');

class careerDAO extends abstractDAO{

	function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function getCareers($profileId){
    	//The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT careerName, careerDes, careerLocation, experienceTitle, experienceDes,experienceTime FROM users_career WHERE usersid ='.$profileId);
        $careers = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
					$career = new Career($row['careerName'], $row['careerDes'], $row['careerLocation'], $row['experienceTitle'], $row['experienceDes'],$row['experienceTime']);
					$careers[] = $career;
				
            }
            $result->free();
            return $careers;
        }
        $result->free();
        return false;
    }

}

?>