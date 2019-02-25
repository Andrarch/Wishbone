<?php
	class Mailinglist {
		private $customerfName;
		private $customerlName;		
		private $phoneNumber;
		private $emailAddress;

		
		function __Construct($customerfName,$customerlName,$phoneNumber,$emailAddress){
			$this->setCustomerfName($customerfName);
			$this->setCustomerlName($customerlName);
			$this->setPhoneNumber($phoneNumber);	
			$this->setEmailAddress($emailAddress);
		}
		
		public function getCustomerfName(){
			return $this->customerfName;
		}
		
		public function setCustomerfName($customerfName){
			$this->customerfName = $customerfName;
		}
		
		public function getCustomerlName(){
			return $this->customerlName;
		}
		
		public function setCustomerlName($customerlName){
			$this->customerlName = $customerlName;	
		}
		
		public function getPhoneNumber(){
			return $this->phoneNumber;	
		}
		
		public function setPhoneNumber($phoneNumber){
			$this->phoneNumber = $phoneNumber;	
		}
		
		public function getEmailAddress(){
			return $this->emailAddress;	
		}
		
		public function setEmailAddress($emailAddress){
			$this->emailAddress = $emailAddress ;
		}
		
		public function getUserName(){
			return $this->username;	
		}
		
		public function setUserName($username){
			$this->username = $username;	
		}
		
		public function getReferral(){
			return $this->referral;	
		}
		
		public function setReferral($referral){
			$this->referral = $referral;
		}
		

		
	}
?>