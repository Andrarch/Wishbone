<?php
class Career
{
	private $careerName;
	private $careerDes;		
	private $careerLocation;
	private $experienceTitle;
	private $experienceDes;
	private $experienceTime;
	
	function __Construct($careerName,$careerDes,$careerLocation,$experienceTitle,$experienceDes,$experienceTime)
	{
		$this->setCareerName($careerName);
		$this->setCareerDes($careerDes);
		$this->setCareerLocation($careerLocation);
		$this->setExperienceTitle($experienceTitle);
		$this->setExperienceDes($experienceDes);
		$this->setExperienceTime($experienceTime);
	}

	public function getCareerName(){
		return $this->careerName;
	}
		
	public function setCareerName($careerName){
		$this->careerName = $careerName;
	}

	public function getCareerDes(){
		return $this->careerDes;
	}
		
	public function setCareerDes($careerDes){
		$this->careerDes = $careerDes;
	}

	public function getCareerDate(){
		return $this->careerDate;
	}

	public function getCareerLocation(){
		return $this->careerLocation;
	}
		
	public function setCareerLocation($careerLocation){
		$this->careerLocation = $careerLocation;
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
}

?>