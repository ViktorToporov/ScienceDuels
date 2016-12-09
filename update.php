<?php
$link = mysql_connect("localhost:3306", "crazyde_SD_users", "users123");
mysql_select_db("crazyde_SD_users", $link);
$result = mysql_query("SELECT * FROM  `maths` WHERE user1 = '".$_SESSION['username']."' ");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
   if($row['user2']!="none")
{
$new="ok";
}
else
$new="no";
}
echo $new;
mysql_free_result($result);
mysql_close($link);
?>