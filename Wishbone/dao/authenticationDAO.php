<?php
require_once('abstractDAO.php');
require_once('./model/authentication.php');

    class AuthenticationDAO extends AbstractDAO {
        
        function __construct() {
            try{
                parent::__construct();
            } catch(mysqli_sql_exception $e){
                throw $e;
            }
        }
        
        

        public function addNewRegistrant($Registrant){
            $imageLoc=array('assets/img/profile/M1.jpg','assets/img/profile/M2.jpg','assets/img/profile/M3.jpg',
                'assets/img/profile/M4.jpg','assets/img/profile/M5.jpg','assets/img/profile/M6.jpg','assets/img/profile/M7.jpg',
                'assets/img/profile/M8.jpg','assets/img/profile/M9.jpg','assets/img/profile/F1.jpg','assets/img/profile/F2.jpg',
                'assets/img/profile/F3.jpg','assets/img/profile/F4.jpg','assets/img/profile/F5.jpg','assets/img/profile/F6.jpg'
            );
            
            
            if(!$this->mysqli->connect_errno){
                $query1 = 'INSERT INTO authentication
                            (email, pass) VALUES(?,?)';
                $email = $Registrant->getRegistrantEmail();
                $pass = $Registrant->getRegistrantPassword();
                $stmt = $this->mysqli->prepare($query1);
                $stmt->bind_param('ss', $email,$pass);
                $stmt->execute();
                //$stmt->close();
                
                $querya='select authid from authentication where email = ?';
                $stmta = $this->mysqli->prepare($querya);
                $stmta->bind_param('s', $email);
                $stmta->execute();
                $stmta->bind_result($authId);
                $stmta->fetch();
                $stmta->close();
                    
                
				
				$query2 = 'INSERT INTO users(authid, firstname, lastname,imagelocation)
							VALUES(?,?,?,?)';
				$loc=$imageLoc[rand(0,14)];
				$firstname = $Registrant->getRegistrantFirstName();
				$lastname = $Registrant->getRegistrantLastName();
				$stmt2 = $this->mysqli->prepare($query2);
				$stmt2->bind_param('ssss',$authId, $firstname,$lastname,$loc);
				$stmt2->execute();
				//$stmt2->close();
				
				$querya='SELECT userid FROM users WHERE authid = ?';
				$stmta = $this->mysqli->prepare($querya);
				$stmta->bind_param('s', $authId);
				$stmta->execute();
				$stmta->bind_result($userID);
				$stmta->fetch();
				$stmta->close();
				
				$query3 = 'INSERT INTO artists(userid) VALUES(?)';
				$stmt3 = $this->mysqli->prepare($query3);
				$stmt3->bind_param('s',$userID);
				$stmt3->execute();
				//$stmt3->close();
				
				$queryb = 'INSERT INTO address (userid) VALUES(?)';
				$stmtb = $this->mysqli->prepare($queryb);
				$stmtb->bind_param('s',$userID);
				$stmtb->execute();
				//$stmtb->close();
				
				$queryc = 'INSERT INTO contact (userid) VALUES(?)';
				$stmtc = $this->mysqli->prepare($queryc);
				$stmtc->bind_param('s',$userID);
				$stmtc->execute();
				//$stmtc->close();
				


				
				$query5 = 'SELECT artistid FROM artists WHERE userID = ?';
				
				if($stmt5 = $this->mysqli->prepare($query5)){
					$stmt5->bind_param('s', $userID);
					$stmt5->execute();
					$stmt5->bind_result($artistId);
					$stmt5->fetch();
					$stmt5->close();
					echo $artistId;
					$query4 = 'INSERT INTO artprofile(artistid) VALUES (?)';
					
					$stmt4 = $this->mysqli->prepare($query4);
					$stmt4->bind_param('i',$artistId);
					$stmt4->execute();
					//$stmt4->close();
										
					$query6 = 'INSERT INTO artist_artform (artformid, artistid) VALUES (1,?)';
					
					if(false === $this->mysqli->prepare($query6)){
						die('prepare() failed: ' . htmlspecialchars($this->mysqli->error));
					}else{
						$stmt6 = $this->mysqli->prepare($query6);
						$stmt6->bind_param('i', $artistId);
						$stmt6->execute();
						$stmt6->close();
					}
					
					$query7 = 'INSERT INTO artist_interest (interestid, artistid) VALUES (1,?)';
					if(false === $this->mysqli->prepare($query7)){
						die('prepare() failed: ' . htmlspecialchars($this->mysqli->error));
					}else{
						$stmt7 = $this->mysqli->prepare($query7);
						$stmt7->bind_param('i', $artistId);
						$stmt7->execute();
						$stmt7->close();
					}
					$query8 = 'SELECT profileid FROM artprofile WHERE artistid= ?';
					
					if(false === $this->mysqli->prepare($query8)){
					    die('prepare() failed: ' . htmlspecialchars($this->mysqli->error));
					}else{
					    $stmt8 = $this->mysqli->prepare($query8);
					    $stmt8->bind_param('i', $artistId);
					    $stmt8->execute();
					   
					    $stmt8->bind_result($profileId);
					    $stmt8->fetch();
					    $stmt8->close();
					    
		
					}
					$query9 = "INSERT INTO experience (experiencetitle,experiencedes,experiencetime ,profileid) VALUES ('title','description','time',?)";
					if(false === $this->mysqli->prepare($query9)){
					    die('prepare() failed: ' . htmlspecialchars($this->mysqli->error));
					}else{
					    $stmt9 = $this->mysqli->prepare($query9);
					    $stmt9->bind_param('i', $profileId);
					    $stmt9->execute();
					    $stmt9->close();
					}
					
					
				}else{
					$error = $this->mysqli->errno . ' ' . $this->mysqli->error;
					 echo $error;
				}
				

				//$query4 = 'SELECT artists.artistid FROM artists INNER JOIN users ON users.userid = artists.userid WHERE users.firstname = ? AND users.lastname = ?';
				// $stmt4 = $this->mysqli->prepare($query4);
				// $stmt4->bind_param('ss', $firstname, $lastname);
				// $stmt4->execute();
				// $stmt4->bind_result($artistId);
				// $stmt4->fetch();
				
				
				
				
				
				// if($stmt4 = $this->mysqli->prepare($query4)){
					// $stmt4->bind_param('ss', $firstname, $lastname);
					// $stmt4->execute();
					// $stmt4->bind_result($artistId);
					// $stmt4->fetch();
				// }else{
					// $error = $this->mysqli->errno . ' ' . $this->mysqli->error;
					 // echo $error;
				// }
				
				
				// echo $artistId;
				
				
				
				
				
				
				
				// $query5 = 'INSERT INTO artprofile(artistid) VALUES (?)';
				// $stmt5 = $this->mysqli->prepare($query5);
				// $stmt5->bind_param('i', $artistId);
				// $stmt5->execute();
				
				
				// $query5 = 'INSERT INTO artist_artform(artistid) VALUES (?);';
				// $stmt5 = $this->mysqli->prepare($query5);
				// $stmt5->bind_param(i, $artist_id);
				// $stmt5->execute();
				
				
				if($stmt->error){
					return $stmt->error;
				}else if($stmt2->error){
					return $stmt2->error;
				}else if($stmt3->error){
					return $stmt3->error;
				}else if($stmt4->error){
					return $stmt4->error;
				}else if($stmt5->error){
					return $stmt5->error;
				}else if($stmt6->error){
					return $stmt6->error;
				}else if($stmt7->error)
					return $stmt7->error;
				else{
					return $Registrant->getRegistrantFirstName().' '.$Registrant->getRegistrantLastName().' '.$Registrant->getRegistrantEmail().' added successfully';
				}

            }else{
                return 'Could not connect to Database';
            }
        }
       
    }
?>