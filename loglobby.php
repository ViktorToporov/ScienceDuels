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
$lobbyname = $_SESSION['sda'];
mysql_query("UPDATE maths SET user2 = '".$_SESSION['username']."' WHERE user1 = '$lobbyname'");
if($lobbyname != "")
header("location: lobbies/".$lobbyname."/lobby-waiting.php");
else
header("location: loglobby.php")
?>