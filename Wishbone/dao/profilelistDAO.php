<?php
require_once('abstractDAO.php');
require_once('./model/experience.php');

class profilelistDAO extends abstractDAO{
	
	function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

	public function getProfilelists($userid){
		$profilelists = Array();

 		//get the userfirstname,userlastname
        $getnames = $this->mysqli->query(
        	'SELECT firstname,lastname, imagelocation
        	 FROM users
        	 WHERE userid ='.$userid);
        if (!$getnames) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
		$names = mysqli_fetch_row($getnames);
		$firstname = $names[0];
		$lastname = $names[1];
		$imagelocation=$names[2];
		$getnames->free();
		$profilelists['firstname'] = $firstname;
		$profilelists['lastname'] = $lastname;
		$profilelists['imagelocation']=$imagelocation;

        //get the artistid
        $getartid = $this->mysqli->query(
        	'SELECT artistid 
        	 FROM artists
        	 WHERE userid ='.$userid);
        if (!$getartid) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
		$artistid = mysqli_fetch_row($getartid);
		$artistid = $artistid[0];
		$getartid->free();
		$profilelists[] = $artistid;

        //get the artfromid
        $getartformid = $this->mysqli->query(
        	'SELECT artformid 
        	 FROM artist_artform
        	 WHERE artistid ='.$artistid);
        if (!$getartformid) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
        $artformid = mysqli_fetch_row($getartformid);
		$artformid = $artformid[0];
		$getartformid->free();
		$profilelists[] = $artformid;

        //get the formname
        $getformname = $this->mysqli->query(
        	'SELECT formname
        	 FROM artforms
        	 WHERE artformid ='.$artformid);
        $formname = mysqli_fetch_row($getformname);
        if (!$getformname) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
		$formname = $formname[0];
		$getformname->free();
		$profilelists['role'] = $formname;

		//get the bio and profileid from profile
		$getbio = $this->mysqli->query(
        	'SELECT bio,profileid,shareurl,urldes
        	 FROM artprofile
        	 WHERE artistid ='.$artistid);
		if (!$getbio) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
        $info = mysqli_fetch_row($getbio);
		$bio = $info[0];
		$profileid = $info[1];
		$url = $info[2];
		$ueldes = $info[3];
		$getbio->free();
		$profilelists['bio'] = $bio;
		$profilelists[] = $profileid;
		$profilelists['url'] = $url;
		$profilelists['urldes'] = $ueldes;

		//get address from adress table
		$getaddress = $this->mysqli->query(
        	'SELECT city,province,country,publicaddress
        	 FROM address
        	 WHERE userid ='.$userid);
		if (!$getaddress) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
 		$addressinfo = mysqli_fetch_row($getaddress);
 		$city = $addressinfo[0];
 		$province = $addressinfo[1];
 		$profilelists['city'] = $city;
		$profilelists['province'] = $province;

		//get contactinfo from contact table
		$getcontact = $this->mysqli->query(
        	'SELECT email,phonenumber
        	 FROM contact
        	 WHERE userid ='.$userid);
		if (!$getcontact) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
 		$contactinfo = mysqli_fetch_row($getcontact);
 		$email = $contactinfo[0];
 		$phone = $contactinfo[1];
 		$profilelists['email'] = $email;
		$profilelists['phone'] = $phone;

        //get experience info from experience table
        $getexperience = $this->mysqli->query(
        	'SELECT experiencetitle, experiencedes,experiencetime
        	 FROM experience
        	 WHERE profileid ='.$profileid);
		if (!$getexperience) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
   		//Loop experience and fet results
        if($getexperience->num_rows >= 1){
            while($row = $getexperience->fetch_assoc()){
            	$experience = new Experience($row['experiencetitle'], $row['experiencedes'], $row['experiencetime'],$profileid);
            	 $profilelists['experience']= $experience;
            	
            }
        }
        $getexperience->free();
        //var_dump($profilelists);exit;
        return $profilelists;
    }
	
	public function updateProfilelists($updateinfo,$userid){
	/*sample of the data in $updateinfo*/
// userFirstName	Minyi
// userLastName	Yang
// userEmail	minyi.yang@hotmail.com
// userPhoneNumber	6137009020
// city	Ottawa,Ontario
// role	Artist
// bio	i+am+a+foodie
// url	https://www.youtube.com/watch?v=8GmYYyzT_Rs&start_radio=1&list=RD8GmYYyzT_Rs
// urldes	+It+is+a+very+good+example+of+my+work
// experiencetitle	designer
// experiencetime	2018.09-now
// experiencedes	+i+AM+AWESOME!  

		$userFirstName = $updateinfo[0];
		$userLastName = $updateinfo[1];
		
		$userEmail = $updateinfo[2];
		$userPhoneNumber = $updateinfo[3];

		$city_province = explode (',',$updateinfo[4]);
		$city = $city_province[0];
		$province = $city_province[1];

		$role = $updateinfo[5];
		$bio = $updateinfo[6];
		$url = $updateinfo[7];
		$urldes = $updateinfo[8];

		$experiencetitle = $updateinfo[9];
		$experiencetime = $updateinfo[10];
		$experiencedes = $updateinfo[11];

		//get the artistid
        $getartid = $this->mysqli->query(
        	'SELECT artistid 
        	 FROM artists
        	 WHERE userid ='.$userid);
        if (!$getartid) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
		$artistid = mysqli_fetch_row($getartid);
		$artistid = $artistid[0];
		$getartid->free();

		//get the artfromid
        $getartformid = $this->mysqli->query(
        	'SELECT artformid 
        	 FROM artist_artform
        	 WHERE artistid ='.$artistid);
        if (!$getartformid) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
        $artformid = mysqli_fetch_row($getartformid);
		$artformid = $artformid[0];
		$getartformid->free();

		//get the profileid from profile
		$getprofileid = $this->mysqli->query(
        	'SELECT profileid
        	 FROM artprofile
        	 WHERE artistid ='.$artistid);
		if (!$getprofileid) {
		    echo 'Could not run query: ' . mysql_error();
		    exit;
		}
        $info = mysqli_fetch_row($getprofileid);
		$profileid = $info[0];
		$getprofileid->free();
	

		$sql_user = "UPDATE users SET lastname='$userFirstName', firstname='$userLastName' WHERE userid=$userid";
		$sql_contact = "UPDATE contact SET email='$userEmail', phonenumber='$userPhoneNumber' WHERE userid=$userid";
		$sql_address = "UPDATE address SET city='$city', province='$province' WHERE userid=$userid";
		$sql_profile = "UPDATE artprofile SET shareurl='$url', bio='$bio', urldes='$urldes'  WHERE profileid=$profileid";
		$sql_experience = "UPDATE experience SET experiencetitle='$experiencetitle', experiencetime='$experiencetime', experiencedes='$experiencedes' WHERE profileid=$profileid";

		$res_user = $this->mysqli->query($sql_user);
		$res_contact = $this->mysqli->query($sql_contact);
		$sql_address = $this->mysqli->query($sql_address);
		$sql_profile = $this->mysqli->query($sql_profile);
		$sql_experience = $this->mysqli->query($sql_experience);

		if($res_user && $res_contact && $sql_address && $sql_profile && $sql_experience){
		    return "Record updated successfully";
		} else {
		    return "Error updating record: " . $mysqli->error;
		}
	}

	
}
?>