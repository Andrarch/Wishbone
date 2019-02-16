<?php
    class Authentication {
        private $registrantFirstName;
        private $registrantLastName;
        private $registrantEmail;
        private $registrantPassword;
        
        function __construct($registrantFirstName, $registrantlastName, $registrantEmail, $registrantPassword){
           $this->setRegistrantFirstName($registrantFirstName);
           $this->setRegistrantFirstName($registrantFirstName);
           $this->setRegistrantEmail($registrantEmail);
           $this->setRegistrantPassword($registrantPassword);
        }
        
        public function getRegistrantFirstName(){
            return $this->registrantFirstName;
        }
        
        public function setRegistrantFirstName($registrantFirstName){
            $this->registrantFirstName = $registrantFirstName;
        }
        
        public function getRegistrantLastName() {
            return $this->registrantLastName;
        }
        
        public function setRegistrantLastName($registrantLastName){
            $this->registrantLastName = $registrantLastName;
        }
        
        public function getRegistrantEmail() {
            return $this->registrantEmail;
        }
        
        public function setRegistrantEmail($registrantEmail){
            $this->registrantEmail = $registrantEmail;
        }
        
        public function getRegistrantPassword() {
            return $this->registrantPassword;
        }
        
        public function setRegistrantPassword($registrantPassword) {
            $this->registrantPassword = $registrantPassword;
        }
    }
?>