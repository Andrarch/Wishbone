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
                $query = 'INSERT INTO authentication
                            (email, pass) VALUES(?,?)';
                
                $email = $Registrant->getRegistrantEmail();
                $pass = $Registrant->getRegistrantPassword();
                
                $stmt = $this->mysqli->prepare($query);
                $stmt->bind_param('ss', $email,$pass);
                $stmt->execute();
                if($stmt->error){
                    return $stmt->error;
                }else{
                    return $Registrant->getRegistrantFirstName().' '.$Registrant->getRegistrantLastName().' '.$Registrant->getRegistrantEmail().'added successfully';
                }
            }else{
                return 'Could not connect to Database';
            }
        }
       
    }
?>