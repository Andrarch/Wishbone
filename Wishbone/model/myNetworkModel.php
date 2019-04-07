<?php
    class myNetworkUser {
        private $userFName;
        private $userLName;
        private $interests=[];
        private $userID;
        private $status;
        private $imagelocation;
        
        function __construct($userFName, $userLName, $userID, $status,$imagelocation){
           $this->setUserFName($userFName);
           $this->setUserLName($userLName);
           $this->setUserID($userID);
           $this->setStatus($status);
           $this->setImageLocation($imagelocation);
           
        }
        
        public function getUserFName(){
            return $this->userFName;
        }
        public function getImageLocation(){
            return $this->imagelocation;
        }
        public function setImageLocation($imagelocation){
            $this->imagelocation=$imagelocation;
        }
        
        public function setUserFName($userFName){
            $this->userFName = $userFName;
        }
        
        public function getUserLName() {
            return $this->userLName;
        }
        
        public function setUserLName($userLName){
            $this->userLName = $userLName;
        }
        
        public function getUserID() {
            return $this->userID;
        }
        
        public function setUserID($userID){
            $this->userID = $userID;
        }
        
        public function getInterests() {
            return $this->interests;
        }
        
        public function setInterests($interests) {
            $this->interests = $interests;
        }
        public function getStatus(){
            return $this->status;
            
        }
        public function setStatus($status){
            $this->status=$status;
        }
        
        public function generateMyNetworkCell($var){
            
            if ($this->getStatus()==0){
                
                echo "<li class=\"hexNone\">";
                echo " <div class=\"hexIn\">";
                echo "<a class='hexLink' href=\"#\">";
                echo "<img src=\"https://farm7.staticflickr.com/6139/5986939269_10721b8017.jpg\" alt=\"\" />";
                echo "<h1></h1><p>";
                echo "</p> </a> </div> </li>";
                
            }
            if ($this->getStatus()==1){
                echo "<li class='hex'>";
                echo " <div class='hexIn'>";
                echo "<a class=\"hexLink\" href=\"#\">";
                echo "<img class='myNet' src=\"".$this->getImageLocation()."\" alt=\"\" />";
                echo "<h1>".$this->getUserFName()." ".$this->getUserLName()."</h1><p>";
                echo "<button class=msgBtn onclick=\"location.href='chat.php?receiverid=".$this->getUserID(). "'\" type=\"button\">Message ".$this->getUserFName()."</button><br><br>";
                echo "<button class=msgBtn onclick=\"location.href='profile.php?id=".$this->getUserID()."' \" type=\"button\">".$this->getUserFName()."'s Profile</button>";
                
                echo "</p> </a> </div> </li>";
            }
            if ($this->getStatus()==2){
                echo "<li class='hexPending'>";
                echo " <div class='hexIn'>";
                echo "<a class=\"hexLink\" href=\"#\">";
                echo "<img class='myNet' src=\"".$this->getImageLocation()."\" alt=\"\" />";
                echo "<h1>".$this->getUserFName()." ".$this->getUserLName()."</h1><p>";
                echo "<button class=msgBtn onclick=\"location.href='myNetwork.php?Pending=".$var. "' \" type=\"button\">Accept Request</button>";
                echo "<button class=msgBtn onclick=\"location.href='myNetwork.php?Cancel=".$var. "'\" type=\"button\">Deny Request</button>";
                echo "</p> </a> </div> </li>";
            }
            if ($this->getStatus()==3){
                echo "<li class='hexRequest'>";
                echo " <div class='hexIn'>";
                echo "<a class=\"hexLink\" href=\"#\">";
                echo "<img class='myNet' src=\"".$this->getImageLocation()."\" alt=\"\" />";
                echo "<h1>".$this->getUserFName()." ".$this->getUserLName()."</h1><p>";
                echo "<button class=msgBtn onclick=\"location.href='myNetwork.php?Cancel=".$var. "'\" type=\"button\">Cancel Request</button>";
                echo "</p> </a> </div> </li>";
            }
            if ($this->getStatus()==4){
                echo "<li class='hexSuggest'>";
                echo " <div class='hexIn'>";
                echo "<a class=\"hexLink\" href=\"#\">";
                echo "<img class='myNet' src=\"".$this->getImageLocation()."\" alt=\"\" />";
                echo "<h1>".$this->getUserFName()." ".$this->getUserLName()."</h1><p>";
                echo "<button class=msgBtn onclick=\"location.href='myNetwork.php?Suggest=".$var. "'\" type=\"button\">Invite to Network</button>";
                echo "</p> </a> </div> </li>";
            }
         
        }
        public static function genSpace(){
            echo "    <li class='hex'>";
            echo "<div class='hexIn'>";
            
            echo "</div>";
            echo "</li>";
        }
        
    }
?>