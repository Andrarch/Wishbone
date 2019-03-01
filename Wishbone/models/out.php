<?php
//output
 var_dump($_POST);
 $login=$_POST['login'];
 $password=$_POST['password'];
 echo $login;
 echo "<br>";
 echo $password;
 $link = mysqli_connect("localhost", "root", "", "wishbone");
 