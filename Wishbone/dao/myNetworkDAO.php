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
        public function cancelRequest($id){
            
        }
        public function acceptRequest($id){
            
        }
        public function sendRequest($id){
            
        }
        
    }
?>