<?php
session_start();
require_once('check_login.inc.php');
if(check_login()===FALSE)
{  session_destroy();
   header('location: login.html');
   die();
}
$link = mysql_connect("localhost:3306", "crazyde_SD_users", "users123");
mysql_select_db("crazyde_SD_users", $link);
$result = mysql_query("SELECT * FROM  `maths` WHERE user1 = '".$_SESSION['username']."' ");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
   if($row['user2']!="none")
{
session_regenerate_id();
$_SESSION['sda'] = $row['user2'];
$random = rand(1, 3);
mysql_query("UPDATE maths SET random = '$random' WHERE user1 = '".$_SESSION['username']."'");
header('location: lobbies/'.$_SESSION['username'].'/duel.php');
}
}
$result = mysql_query("SELECT * FROM  `maths` WHERE user1 = '".$_SESSION['sda']."' ");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
   if($row['user2']!="none")
{
header('location: lobbies/'.$_SESSION['sda'].'/duel.php');
}
}

?>