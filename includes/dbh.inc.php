<?php

$serverName = "localhost";
$dbUserName = "root";
$dbName = "loginsystemphp";
$dbPassword = "";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
  die("connection faild: ".mysql_connetion_error());
}

?>