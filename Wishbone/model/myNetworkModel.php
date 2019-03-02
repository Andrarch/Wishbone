<?php
    class myNetworkUser {
        private $userFName;
        private $userLName;
        private $interests=[];
        private $userID;
        private $status;
        
        function __construct($userFName, $userLName, $userID, $status){
           $this->setUserFName($userFName);
           $this->setUserFName($userFName);
           $this->setUserID($userID);
           $this->setStatus($status);
        }
        
        public function getUserFName(){
            return $this->userFName;
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
    }
?>