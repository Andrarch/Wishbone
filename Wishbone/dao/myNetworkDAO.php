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
        
       
        public function getMyNetwork($userid){
            
            $resultReturn=array( new myNetworkUser('', '', '', 0),new myNetworkUser('', '', '', 0),new myNetworkUser('', '', '', 0),
                new myNetworkUser('', '', '', 0),new myNetworkUser('', '', '', 0),new myNetworkUser('', '', '', 0),new myNetworkUser('', '', '', 0));
            if(!$this->mysqli->connect_errno){
                $query = "select connected_friends.leftid, connected_friends.rightid, leftside.firstname, leftside.lastname, rightside.firstname, rightside.lastname, connected_friends.confirmright
                    from connected_friends
                    inner join users leftside on connected_friends.leftid=leftside.userid
                    inner join users rightside on connected_friends.rightid=rightside.userid
                    where connected_friends.leftid="+$userid+" or connected_friends.rightid="+$userid;
                
                if ($result = mysqli_query($this->mysqli, $query)) {
                    $count=0;
                    $status=0; /* Status 0 = nothing, 1 = linked, 2=request in, 3=request out */
                    $otherID='';
                    $userFName='';
                    $userLName='';
                    
                    while ($row = $result->fetch_object()){
                        if ($row[0]==$userid){
                            if ($row[6]==1){
                              $status=1;  
                            }
                            else{
                                $status=3;
                            }
                            $userFName=$row[4];
                            $userLName=$row[5];
                            $otherID=$row[1];
                          
                        }
                        if ($row[1]==$userid){
                            if ($row[6]==1){
                                $status=1;
                            }
                            else{
                                $status=2;
                            }
                            $userFName=$row[2];
                            $userLName=$row[3];
                            $otherID=$row[0];
                        }
                        
                        $resultReturn[int($count)]=new myNetworkUser($userFName, $userLName, $otherID, $status);
                        $count++;
                        
                        
                    }
                    mysqli_free_result($result);
                    
                    
                }
                

           }

           return $resultReturn;
           
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