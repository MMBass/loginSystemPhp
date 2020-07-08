<?php

$dbserverName = "lolyz0ok3stvj6f0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbUserName = "l57g6xqcchkh24c7";
$dbName = "mh5sg71nlsivo7lr";
$dbPassword = "equzxjw9gg4oes8q";

$conn = mysqli_connect($dbserverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
  die("connection faild: ".mysql_connetion_error());
}

?>
