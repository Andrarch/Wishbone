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
            session_start();
            $temp =new myNetworkUser('', '', '', 0);
            $_SESSION['myNetworkSet']=array();
            $_SESSION['myNetworkSet'][0]=$temp;
            $_SESSION['myNetworkSet'][1]=$temp;
            $_SESSION['myNetworkSet'][2]=$temp;
            $_SESSION['myNetworkSet'][3]=$temp;
            $_SESSION['myNetworkSet'][4]=$temp;
            $_SESSION['myNetworkSet'][5]=$temp;
            $_SESSION['myNetworkSet'][6]=$temp;
            
            if(!$this->mysqli->connect_errno){
                $query = "select connected_friends.leftid as leftid, connected_friends.rightid as rightid, leftside.firstname as leftFirst, leftside.lastname as leftLast, rightside.firstname as rightFirst, rightside.lastname as rightLast, connected_friends.confirmright as confirm
                    from connected_friends
                    inner join users leftside on connected_friends.leftid=leftside.userid
                    inner join users rightside on connected_friends.rightid=rightside.userid
                    where connected_friends.leftid=".$userid." or connected_friends.rightid=".$userid;
                
                if ($result = mysqli_query($this->mysqli, $query)) {
                    $count=0;
                    $status=0; /* Status 0 = nothing, 1 = linked, 2=request in, 3=request out */
                    $otherID='';
                    $userFName='';
                    $userLName='';
                    
                    while ($row = $result->fetch_object()){
                        if ($row->leftid==$userid){
                            if ($row->confirm==1){
                              $status=1;  
                            }
                            else{
                                $status=3;
                            }
                            $userFName=$row->rightFirst;
                            $userLName=$row->rightLast;
                            $otherID=$row->rightid;
                          
                        }
                        if ($row->rightid==$userid){
                            if ($row->confirm==1){
                                $status=1;
                            }
                            else{
                                $status=2;
                            }
                            $userFName=$row->leftFirst;
                            $userLName=$row->leftLast;
                            $otherID=$row->leftid;
                        }
                        
                        $_SESSION['myNetworkSet'][(int)$count]=new myNetworkUser($userFName, $userLName, $otherID, $status);
                        $count++;
                        
                        
                    }
                    mysqli_free_result($result);
                    
                    
                }
                

           }
           
        }
        public function cancelRequest($userID,$id){
            session_start();
            if(isset($_SESSION['userID'])){
                $userID=$_SESSION['userID'];
            }
            if(!$this->mysqli->connect_errno){
                $query = "delete from connected_friends where leftid=".$userID." and rightid=".$id;                 
                $result = mysqli_query($this->mysqli, $query);
                
                }
                header( 'Location:myNetwork.php');
        }
        public function acceptRequest($userID,$id){
            session_start();
            if(isset($_SESSION['userID'])){
                $userID=$_SESSION['userID'];
            }
            if(!$this->mysqli->connect_errno){
                $query = "update from connected_friends set confirmright=1 where leftid=".$id." and rightid=".$userID;
                $result = mysqli_query($this->mysqli, $query);
                
            }
            header( 'Location:myNetwork.php');
        }
        public function sendRequest($userID,$id){
            session_start();
            if(isset($_SESSION['userID'])){
                $userID=$_SESSION['userID'];
            }
            if(!$this->mysqli->connect_errno){
                $query = "Insert into connected_friends (leftid, rightid, confirmright) values (".$userID.','.$id.','.'0)';
                $result = mysqli_query($this->mysqli, $query);
                
            }
            header( 'Location:myNetwork.php');
            
            
        }
        public function getMyNetworkSuggest($userid){
            session_start();
            $temp =new myNetworkUser('', '', '', 0);
            $_SESSION['myNetworkSetSug']=array();
            $_SESSION['myNetworkSet'][0]=$temp;
            $_SESSION['myNetworkSet'][1]=$temp;
            $_SESSION['myNetworkSet'][2]=$temp;
            
            
            if(!$this->mysqli->connect_errno){
              /*  $query = "select users.userid, users.firstname, users.lastname
                    from address
                    inner join users on address.userid=users.userid
                    where city='Ottawa'"; */
                    $query= "select * from users where userid not in (
select leftid, rightid from connected_friends where leftid=".$userid." and rightid=".$userid.")";
                    
                if ($result = mysqli_query($this->mysqli, $query)) {
                    $count=0;
                    $status=0; /* Status 0 = nothing, 1 = linked, 2=request in, 3=request out */
                    $otherID='';
                    $userFName='';
                    $userLName='';
                    
                    while ($row = $result->fetch_object()){
                        if ($row->leftid==$userid){
                            if ($row->confirm==1){
                                $status=1;
                            }
                            else{
                                $status=3;
                            }
                            $userFName=$row->rightFirst;
                            $userLName=$row->rightLast;
                            $otherID=$row->rightid;
                            
                        }
                        if ($row->rightid==$userid){
                            if ($row->confirm==1){
                                $status=1;
                            }
                            else{
                                $status=2;
                            }
                            $userFName=$row->leftFirst;
                            $userLName=$row->leftLast;
                            $otherID=$row->leftid;
                        }
                        
                        $_SESSION['myNetworkSet'][(int)$count]=new myNetworkUser($userFName, $userLName, $otherID, $status);
                        $count++;
                        
                        
                    }
                    mysqli_free_result($result);
                    
                    
                }
                
                
            }
            
        }
    }
?>