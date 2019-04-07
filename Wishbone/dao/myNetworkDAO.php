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
            
            $temp =new myNetworkUser('', '', '', 0,'assets/5733278274_2626612c70.jpg');
            $_SESSION['myNetworkSet']=array();
            $_SESSION['myNetworkSet'][0]=$temp;
            $_SESSION['myNetworkSet'][1]=$temp;
            $_SESSION['myNetworkSet'][2]=$temp;
            $_SESSION['myNetworkSet'][3]=$temp;
            $_SESSION['myNetworkSet'][4]=$temp;
            $_SESSION['myNetworkSet'][5]=$temp;
            $_SESSION['myNetworkSet'][6]=$temp;
            
            if(!$this->mysqli->connect_errno){
                $query = "select leftside.imagelocation as imgl, rightside.imagelocation as imgr, connected_friends.leftid as leftid, connected_friends.rightid as rightid, leftside.firstname as leftFirst, leftside.lastname as leftLast, rightside.firstname as rightFirst, rightside.lastname as rightLast, connected_friends.confirmright as confirm
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
                    $imageLocation='assets/5733278274_2626612c70.jpg';
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
                            $imageLocation=$row->imgr;
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
                            $imageLocation=$row->imgl;
                        }
                        
                        $_SESSION['myNetworkSet'][(int)$count]=new myNetworkUser($userFName, $userLName, $otherID, $status,$imageLocation);
                        $count++;
                        
                        
                    }
                    mysqli_free_result($result);
                    while (sizeof($_SESSION['myNetworkSet'])%5!=2 and sizeof($_SESSION['myNetworkSet'])%5!=0  ){
                        $_SESSION['myNetworkSet'][(int)$count]=new myNetworkUser('', '', '', 0,'assets/5733278274_2626612c70.jpg');
                        $count++;
                    }
                    
                }
                

           }
           
        }
        public function cancelRequest($userID,$id){
            
            if(isset($_SESSION['userID'])){
                $userID=$_SESSION['userID'];
            }
            if(!$this->mysqli->connect_errno){
                $query = "delete from connected_friends where leftid=".$userID." and rightid=".$id;                 
                $result = mysqli_query($this->mysqli, $query);
                mysqli_free_result($result);
                $query = "delete from connected_friends where leftid=".$id." and rightid=".$userID;
                $result = mysqli_query($this->mysqli, $query);
                mysqli_free_result($result);
                
                }
                header( 'Location:myNetwork.php');
        }
        public function acceptRequest($userID,$id){
        
            if(isset($_SESSION['userID'])){
                $userID=$_SESSION['userID'];
            }
            if(!$this->mysqli->connect_errno){
                $query = "update connected_friends set confirmright=1 where leftid=".$id." and rightid=".$userID;
                $result = mysqli_query($this->mysqli, $query);
                mysqli_free_result($result);
                
            }
            header( 'Location:myNetwork.php');
        }
        public function sendRequest($userID,$id){
            
            if(isset($_SESSION['userID'])){
                $userID=$_SESSION['userID'];
            }
            if(!$this->mysqli->connect_errno){
                $query = "Insert into connected_friends (leftid, rightid, confirmright) values (".$userID.','.$id.','.'0)';
                $result = mysqli_query($this->mysqli, $query);
                mysqli_free_result($result);
                
            }
            header( 'Location:myNetwork.php');
            
            
        }
        public function getMyNetworkSuggest($userid){
            
            $temp =new myNetworkUser('', '', '', 0,'assets/5733278274_2626612c70.jpg');
            $_SESSION['myNetworkSetSug']=array();
            $_SESSION['myNetworkSetSug'][0]=$temp;
            $_SESSION['myNetworkSetSug'][1]=$temp;
            $_SESSION['myNetworkSetSug'][2]=$temp;
            $_SESSION['myNetworkSetSug'][3]=$temp;
            $_SESSION['myNetworkSetSug'][4]=$temp;
            
            if(!$this->mysqli->connect_errno){
              /*  $query = "select users.userid, users.firstname, users.lastname
                    from address
                    inner join users on address.userid=users.userid
                    where city='Ottawa'"; */
                    $query= "select count(*) as num from users";
                    $numRows=0;
                    $count=0;
                if ($result = mysqli_query($this->mysqli, $query)) {
                    $row = $result->fetch_object();
                    $numRows=$row->num;
                    mysqli_free_result($result);
                    $looper=0;
                    while($count<5){
                        $looper++;
                        if($looper>50){
                            break;
                        }
                        $query= "SELECT * FROM users, (
                                        SELECT userid AS sid
                                        FROM users
                                        ORDER BY RAND( )
                                        LIMIT 1
                                    ) tmp
                                WHERE users.userid = tmp.sid";
                        
                        
                        $status=0; /* Status 0 = nothing, 1 = linked, 2=request in, 3=request out, 4=suggested */
                        $otherID='';
                        $userFName='';
                        $userLName='';
                        $imageLocation='assets/5733278274_2626612c70.jpg';
                        
                        if ($result = mysqli_query($this->mysqli, $query)) {
                            $row = $result->fetch_object();
                            $status=4;
                            $userFName=$row->firstname;
                            $userLName=$row->lastname;
                            $otherID=$row->userid;
                            $imageLocation=$row->imagelocation;
                            $found=0;
                            foreach($_SESSION['myNetworkSet'] as $net){
                                if ($net->getUserID()==$otherID){
                                    $found=1;
                                }
                              
                            }
                            if($otherID==$_SESSION['userid']){
                                $found=1;
                            }
                            foreach($_SESSION['myNetworkSetSug'] as $net){
                                if ($net->getUserID()==$otherID){
                                    $found=1;
                                }
                                
                            }
                            if($found==0){
                                $_SESSION['myNetworkSetSug'][(int)$count]=new myNetworkUser($userFName, $userLName, $otherID, $status,$imageLocation);
                                $count++;
                                $looper=0;
                            }
                            mysqli_free_result($result);
                        }
                        
                        
                    }
                   
                    
                    
                }
                
                
            }
            
        }
    }
?>