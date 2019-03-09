<?php
require_once('abstractDAO.php');
require_once('./model/profilelist.php');


class profilelistDAO extends abstractDAO{
	
	function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

	public function getProfilelists($profileId){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT firstName, lastName, phoneNumber, emailAddress, lifeArea, careerName FROM users_profile INNER JOIN users_career ON users_profile.id = users_career.usersid
        	WHERE id ='.$profileId);
        $profilelists = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
					$profilelist = new Profilelist($row['firstName'], $row['lastName'], $row['phoneNumber'],$row['emailAddress'],$row['lifeArea'],$row['careerName']);
					$profilelists[] = $profilelist;
				
            }
            $result->free();
            return $profilelists;
        }
        $result->free();
        return false;
    }
	
	public function addProfilelist($profilelist){
		if(!$this->mysqli->connect_errno){
			$query = 'INSERT INTO mailinglist 
					(firstName, lastName, phonenumber, emailAddress, username, referrer)
					VALUES (?,?,?,?,?,?)';
			$fname = $profilelist->getCustomerfName();
			$lname = $profilelist->getCustomerlName();
			$phone = $profilelist->getPhoneNumber();
			$email = $profilelist->getEmailAddress();
			$user = $profilelist->getUserName();
			$refer = $profilelist->getReferral();
			
			$stmt = $this->mysqli->prepare($query);
			$stmt->bind_param('ssssss',
				$fname,
				$lname,
				$phone,
				$email,
				$user,
				$refer
			);
			$stmt->execute();
			if($stmt->error){
                return $stmt->error;
            } else {
				return $profilelist->getCustomerfName().' '.$profilelist->getCustomerlName(). ' added successfully!';
			}
		}else{
			return 'Could not connect to Database';
		}
	}
	
	
	
	
}
?>