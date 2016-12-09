<?php
session_start();
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
$link = mysql_connect("localhost:3306", "crazyde_SD_users", "users123");
mysql_select_db("crazyde_SD_users", $link);
$sql="DELETE FROM maths WHERE user1 = '".$_SESSION['username']."'";
mysql_query($sql);
header("location: maths-lobby.php");
?>