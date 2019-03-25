<?php
	class Experience {
		private $experienceTitle;
		private $experienceDes;		
		private $experienceTime;
		private $profileid;
		
		function __Construct($experienceTitle,$experienceDes,$experienceTime,$profileid){
			$this->setExperienceTitle($experienceTitle);
			$this->setExperienceDes($experienceDes);
			$this->setExperienceTime($experienceTime);	
			$this->setProfileid($profileid);	
		}

		public function getExperienceTitle(){
			return $this->experienceTitle;
		}
		
		public function setExperienceTitle($experienceTitle){
			$this->experienceTitle = $experienceTitle;
		}
		
		public function getExperienceDes(){
			return $this->experienceDes;
		}
		
		public function setExperienceDes($experienceDes){
			$this->experienceDes = $experienceDes;	
		}
		
		public function getExperienceTime(){
			return $this->experienceTime;	
		}
		
		public function setExperienceTime($experienceTime){
			$this->experienceTime = $experienceTime;	
		}


		public function getProfileid(){
			return $this->profileid;
		}
			
		public function setProfileid($profileid){
			$this->profileid = $profileid;
		}
		
	}
?>