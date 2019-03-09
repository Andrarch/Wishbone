<?php
include 'Database.class.php';

$conn = new Database("wishbone", "root", "");

if (isset($_REQUEST['action'])) {
    
    $senderid = 2;
    $receiverid = intval( $_GET["receiverid"] );
    $response = array();

    switch ($_REQUEST['action']) {
           
        case "getMessages":
            $last_messageid = intval( $_GET["last_messageid"] );
            
            $response = $conn->select(
               "SELECT `messageid`, `messagecontent`, ( `senderid` = ? ) AS `isSend`
                FROM `messages`
                WHERE `messageid` > ? AND
                ( ( `senderid` = ? AND `receiverid` = ? ) OR ( `senderid` = ? AND `receiverid` = ? ) )",
                $senderid,
                $last_messageid,
                $senderid,
                $receiverid,
                $receiverid,
                $senderid
            );
            break;
           
        case "sendMessage":
            $message = trim($_GET['message']);
            
            if( strlen($message) == 0 )
            {
                break;
            }
            
            $conn->insert(
                "INSERT INTO `messages`(`senderid`, `receiverid`, `messagecontent`) VALUES (?, ?, ?)",
                $senderid, 
                $receiverid, 
                $message
            );
            
            break;
    }
    
    exit( json_encode($response) );
}
