<?php
require_once('abstractDAO.php');
require_once('./model/authentication.php');

    class AuthenticationDAO extends AbstractDAO {
    
        function __construct() {
            try{
                parent::__construct();
            } catch(mysqli_sql_exception $e){
                throw $e;
            }
        }
        

        public function addNewRegistrant($Registrant){
			
            if(!$this->mysqli->connect_errno){
                $query1 = 'INSERT INTO authentication
                            (email, pass) VALUES(?,?)';
                $email = $Registrant->getRegistrantEmail();
                $pass = $Registrant->getRegistrantPassword();
                $stmt = $this->mysqli->prepare($query1);
                $stmt->bind_param('ss', $email,$pass);
                $stmt->execute();
				
				$query2 = 'INSERT INTO users(authid, firstname, lastname)
							VALUES(LAST_INSERT_ID(),?,?)';
				$firstname = $Registrant->getRegistrantFirstName();
				$lastname = $Registrant->getRegistrantLastName();
				$stmt2 = $this->mysqli->prepare($query2);
				$stmt2->bind_param('ss', $firstname,$lastname);
				$stmt2->execute();
				
                if($stmt->error || $stmt2->error){
                    return $stmt->error;
                }else{
                    return $Registrant->getRegistrantFirstName().' '.$Registrant->getRegistrantLastName().' '.$Registrant->getRegistrantEmail().' added successfully';
                }
            }else{
                return 'Could not connect to Database';
            }
        }
       
    }
?>