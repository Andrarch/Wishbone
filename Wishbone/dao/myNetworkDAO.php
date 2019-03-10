<?php
require_once('abstractDAO.php');
require_once('./model/myNetworkModel.php');

    class myNetworkDAO extends AbstractDAO {
    
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
        public function getMyNetworkPair($userID){
            
            $resultReturn=array( array ('',''), array('',''));
            if(!$this->mysqli->connect_errno){
                $query = 'SELECT * from connected_friends where leftid='.$userID.' or rightid='.$userID;
                
                
                if ($result = mysqli_query($this->mysqli, $query)) {
                    $count=2;
                    while ($row = $result->fetch_object()){
                        
                        $resultReturn[$count]=$row;
                        $count++;
                        
                        
                    }
                    mysqli_free_result($result);
                    
                    
                }
                
                return $resultReturn;
            }
        }
        
        public function getMyNetwork($userid){
           $resultset=[] ;
           
           
           $resultset[]=$this->getMyNetworkPair($userid);
           $names=[];
           
           $myNetReturn=[];
           foreach($resultset as $result){
               if($result[2]==0){
                   if($result[1]==$userid){
                       $names=$this->getNames($result[0]);
                       $status='unconfirmed';
                   }
                   else{
                       $names=$this->getNames($result[1]);
                       $status='waiting';
                   }
               }
               else{
                   if($result[1]==$userid){
                       $names=$this->getNames($result[0]);
                       $status='confirmed';
                   }
                   else{
                       $names=$this->getNames($result[1]);
                       $status='confirmed';
                   }
                       
               }
                       
               
               
               $myNet=new myNetworkUser($names[0], $names[1], $userid, $status);
               $myNetReturn[]=$myNet;
           }
           
           while(sizeof($myNetReturn,0)<7){
               $myNetReturn[]=new myNetworkUser('Empty','Empty','Empty','Empty');
           }
            return $myNetReturn;
            
        }
        public function getNames($idNum){
            
            if(!$this->mysqli->connect_errno){
                $query = 'SELECT firstname, lastname from users where userid='.$idNum;
                
                
                if ($result = mysqli_query($this->mysqli, $query)) {
                    $row = $result->fetch_object();
                    
                    mysqli_free_result($result);
                    return $row;
                    
                }
                else{
                    return FALSE;
                    
                }
                
            }
        }
        
    }
?>