<?php

function check_login()
{  session_regenerate_id(true);
   if($_SESSION['is_loged']!==TRUE)return false;
   if($_SESSION['IP']!==md5($_SERVER['REMOVE_ADDR']))return false;
   return TRUE;
}

?>