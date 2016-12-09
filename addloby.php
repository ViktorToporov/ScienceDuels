<?php
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$s=0;
$link = mysql_connect("localhost:3306", "crazyde_SD_users", "users123");
mysql_select_db("crazyde_SD_users", $link);
$names = mysql_query("SELECT * FROM maths", $link);
while ($row = mysql_fetch_array($names, MYSQL_ASSOC)){
if($row["user1"]==$_SESSION['username'])
{

header("location: maths-lobby.php");
$s=1;
}
}
if($s==0)
{
include_once 'dbconnect.php';
$user1 = trim($_SESSION['username']);
$user1 = strip_tags($user1);
$uname2 = trim($_POST['dif-lobby10']);
$uname2 = strip_tags($uname2);
$uname = trim($_POST['name-lobby10']);
$uname = strip_tags($uname);
$mode = trim($_POST['mode-lobby10']);
$mode = strip_tags($mode);
		$query = "INSERT INTO maths(name,gamemode,difficulty,user1,user2)     VALUES('$uname','$mode','$uname2','$user1','none')";
		$res = mysql_query($query);
$lobbydir="lobbies/".$_SESSION['username'];
mkdir($lobbydir, 0777);
$lobbydir = $lobbydir."/lobby-waiting.php";
copy('lobby-waiting.php', $lobbydir);
$lobbydir2 = "lobbies/".$_SESSION['username']."/duel.php";
copy('duel.php', $lobbydir2);
$lobbydir2 = "lobbies/".$_SESSION['username']."/check_login.inc.php";
copy('check_login.inc.php', $lobbydir2);
$lobbydir="location: "."lobbies/".$_SESSION['username']."/lobby-waiting.php";
header($lobbydir);
}
?>