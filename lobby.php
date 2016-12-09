<?php
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
include_once 'dbconnect.php';

        $uname = trim($_POST['lobby-name']);
	
	$name = strip_tags($uname);
	
$query = "SELECT userEmail FROM Lobby WHERE name ='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result);
$query = "INSERT INTO Lobby (name,gamemode)     VALUES('$name','0')";
$res = mysql_query($query);
?>