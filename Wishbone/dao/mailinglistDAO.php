<?php
require_once('abstractDAO.php');
require_once('./model/mailinglist.php');


class mailinglistDAO extends abstractDAO{
	
	function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

	public function getMailinglists($profileId){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT firstName, lastName, phoneNumber, emailAddress FROM users_profile WHERE id ='.$profileId);
        $mailinglists = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new mailinglist object, and add it to the array.
				//error_reporting(0); 
				
					$mailinglist = new Mailinglist($row['firstName'], $row['lastName'], $row['phoneNumber'],$row['emailAddress']);
					$mailinglists[] = $mailinglist;
				
            }
            $result->free();
            return $mailinglists;
        }
        $result->free();
        return false;
    }
	
	public function addMailinglist($mailinglist){
		if(!$this->mysqli->connect_errno){
			$query = 'INSERT INTO mailinglist 
					(firstName, lastName, phonenumber, emailAddress, username, referrer)
					VALUES (?,?,?,?,?,?)';
			$fname = $mailinglist->getCustomerfName();
			$lname = $mailinglist->getCustomerlName();
			$phone = $mailinglist->getPhoneNumber();
			$email = $mailinglist->getEmailAddress();
			$user = $mailinglist->getUserName();
			$refer = $mailinglist->getReferral();
			
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
				return $mailinglist->getCustomerfName().' '.$mailinglist->getCustomerlName(). ' added successfully!';
			}
		}else{
			return 'Could not connect to Database';
		}
	}
	
	
	
	
}
?>