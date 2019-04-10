<?php
 include_once ('dao/searchDAO.php');

class SearchClass {

    protected $conn;

    function __construct() {
        try {
            $this->conn = new searchDAO();
            $this->conn = $this->conn->getMysqli();
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }
    
    public function getUserData($arr) {
        $resultArr = array();
        $len = count($arr);
        for ($i = 0; $i < $len; $i ++) {
            $sql = "Select u.firstname, u.lastname, u.userid from users u where u.userid = " . $arr[$i];
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($resultArr, $row["firstname"] . ' ' . $row['lastname'].' '.$row['userid']);
                }
            }
        }
        return $resultArr;
    }
    
    public function getByOneName($name){
        $sql = "select u.userid, u.firstname, u.lastname from users u where u.firstname = '$name' or u.lastname = '$name'";
        return $this->getFilledArray($sql);
    }

    public function getByName($firstname, $lastname){
        $sql = "select u.userid, u.firstname, u.lastname from users u where u.lastname = '$lastname' and u.firstname = '$firstname'";
        return $this->getFilledArray($sql);
    }
  
    public function getLocation($name, $idArray){
        if (strlen($name) == 0) {
            $sql = " select distinct u.userid, u.firstname, u.lastname from users u, address a 
                      where u.userid = a.userid and (";
        } else {
            $arrName = preg_split('/ /', $name, - 1, PREG_SPLIT_NO_EMPTY);
            $len = count($arrName);
            if ($len == 1) {
                $sql = "select distinct u.userid, u.firstname, u.lastname from users u, address a 
                        where u.userid = a.userid and (u.firstname = '$name' or u.lastname = '$name') and (";
            } else {
                $sql = "select distinct u.userid, u.firstname, u.lastname from users u, address a 
                        where u.userid = a.userid and u.firstname = '$arrName[0]' 
                        and u.lastname = '$arrName[1]' and (";
            }
        }
        
        $items = $this->getAddedItem("location", "a.province");
        $sql = $sql . $items . ')';
        $sql = $this->getUsersIdString($idArray, $sql);

        return $this->getFilledArray($sql);
    }
   
    public function getArtType($name, $idArray) {
        if (strlen($name) == 0) {
            $sql = "select distinct u.userid, u.firstname, u.lastname from users u, artists a, artist_artform aa, artforms af 
                    where u.userid = a.userid and aa.artistid = a.artistid and af.artformid = aa.artformid and (";
        } else {
            $arrName = preg_split('/ /', $name, - 1, PREG_SPLIT_NO_EMPTY);
            $len = count($arrName);
            if ($len == 1) {
                $sql = "select distinct u.userid, u.firstname, u.lastname from users u, artists a, artist_artform aa, artforms af 
                        where u.userid = a.userid and aa.artistid = a.artistid and af.artformid = aa.artformid and (u.firstname = '$name' or u.lastname='$name') and (";
            } else {
                $sql = "select distinct u.userid, u.firstname, u.lastname from users u, artists a, artist_artform aa, artforms af 
                        where u.userid = a.userid and aa.artistid = a.artistid and af.artformid = aa.artformid and u.firstname = '$arrName[0]' and u.lastname='$arrName[1]') and (";
            }
        }

        $items = $this->getAddedItem("artType", "af.formname");
        $sql = $sql . $items . ')';
        $sql = $this->getUsersIdString($idArray, $sql);
        return $this->getFilledArray($sql);
    }
    
    public function getInterest($name, $idArray) {
        if (strlen($name) == 0) {
            $sql = "select u.userid, u.firstname, u.lastname from users u, artists a, artist_interest ai, interests i 
                    where u.userid = a.userid and a.artistid = ai.artistid and ai.interestid = i.interestid and (";
        } else {
            $arrName = preg_split('/ /', $name, - 1, PREG_SPLIT_NO_EMPTY);
            $len = count($arrName);
            if ($len == 1) {
                $sql = "select u.userid, u.firstname, u.lastname from users u, artists a, artist_interest ai, interests i 
                        where u.userid = a.userid and a.artistid = ai.artistid and ai.interestid = i.interestid and (u.firstname = '$name' or u.lastname='$name') and (";
            } else {
                $sql = "select u.userid, u.firstname, u.lastname from users u, artists a, artist_interest ai, interests i 
                        where u.userid = a.userid and a.artistid = ai.artistid and ai.interestid = i.interestid and u.firstname = '$name' and u.lastname='$name' and (";
            }
        }

        $items = $this->getAddedItem("interest", "i.interestname");
        $sql = $sql . $items . ')';
        $sql = $this->getUsersIdString($idArray, $sql);

        return $this->getFilledArray($sql);
    }

    public function getUsersIdString($idArray, $sql) {
        if (! empty($idArray)) {
            $length = count($idArray);
            for ($i = 0; $i < $length; $i ++) {
                if ($i == 0) {
                    $sql = $sql . ' and (u.userid = ' . $idArray[$i];
                } else {
                    $sql = $sql . ' or u.userid = ' . $idArray[$i];
                }
            }
            $sql = $sql . ')';
        }
        return $sql;
    }
   
    public function getAddedItem($itemType, $sqlText) {
        $list = "";
        $arr = $_POST[$itemType];
        $length = count($arr);
        for ($i = 0; $i < $length; $i ++) {
            if ($i == 0) {
                $list = $sqlText . " = '$arr[$i]'";
            } else {
                $list = $list . " or " . $sqlText . " = '$arr[$i]'";
            }
        }
        return $list;
    }
    
    public function getFilledArray($sql) {
        $arrResult = array();
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($arrResult, $row["userid"]);
            }
        }
        return $arrResult;
    }
}


if (! empty($_POST['interest'])) {}
if (! empty($_POST['artType'])) {}
?>