<?php
include 'searchFeed.php';
include_once 'dao/server.php';
$data=$_POST["dataPost"];
require_once('dao/user_home_dao.php');
$dao = new user_home_dao();
$conn = $dao->getMysqli();

//$sql = "select u.firstname, u.lastname, f.feedtext, f.feeddate from users u, feeds f where f.userid = u.userid order by feeddate DESC ";
$sql ="insert into feeds values($login_user_userid, $data,current_time())";
$result = $conn->query($sql);
$link = mysqli_connect(Server::getDB_HOST(), Server::getDB_USERNAME(), Server::getDB_PASSWORD(), Server::getDB_DATABASE());
$insert=mysqli_query($link, "insert into feeds (userid, feedtext, feeddate) values ('$login_user_userid', '$data', current_time())");
echo "<script>location.href='userHome.php'</script>";


if(empty($data)){
    echo "empty";
}

?>