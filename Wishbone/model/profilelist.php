<?php
	class Profilelist {
		private $userfName;
		private $userlName;		
		private $phoneNumber;
		private $emailAddress;
		private $lifeArea;
		private $careerName;

		
		function __Construct($userfName,$userlName,$phoneNumber,$emailAddress,$lifeArea,$careerName){
			$this->setUserfName($userfName);
			$this->setUserlName($userlName);
			$this->setPhoneNumber($phoneNumber);	
			$this->setEmailAddress($emailAddress);
			$this->setLifeArea($lifeArea);
			$this->setCareerName($careerName);
		}

		public function getUserfName(){
			return $this->userfName;
		}
		
		public function setUserfName($userfName){
			$this->userfName = $userfName;
		}
		
		public function getUserlName(){
			return $this->userlName;
		}
		
		public function setUserlName($userlName){
			$this->userlName = $userlName;	
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

		public function getLifeArea(){
			return $this->lifeArea;
		}

		public function setLifeArea($lifeArea){
			$this->lifeArea = $lifeArea ;
		}

		public function getCareerName(){
			return $this->careerName;
		}
			
		public function setCareerName($careerName){
			$this->careerName = $careerName;
		}
		
	}
?>