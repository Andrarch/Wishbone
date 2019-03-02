<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wishbone";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_REQUEST['action'])) {
    
    $senderid = 2;
    $receiverid = intval( $_GET["receiverid"] );
    $response = array();

    switch ($_REQUEST['action']) {
           
        case "getMessages":
            $last_messageid = intval( $_GET["last_messageid"] );
            
            $sql = "
                SELECT `messageid`, `messagecontent`, ( `senderid` = $senderid ) AS `isSend`
                FROM `messages`
                WHERE `messageid` > $last_messageid AND
                ( ( `senderid` = $senderid AND `receiverid` = $receiverid ) OR ( `senderid` = $receiverid AND `receiverid` = $senderid ) )";
            
            $result = $conn->query($sql);
            
            if( $result->num_rows )
            {
                while ($row = $result->fetch_assoc())
                {
                    $response[] = $row;
                }
            }
            break;
           
        case "sendMessage":
            $message = $_GET['message'];
            
            $sql = "INSERT INTO `messages`(`senderid`, `receiverid`, `messagecontent`) VALUES ($senderid, $receiverid, '$message')";
            
            $conn->query($sql);
            
            break;
    }
    
    exit( json_encode($response) );
}
