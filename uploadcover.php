<?php
session_start();
require_once('check_login.inc.php');
if(check_login()===FALSE)
{  session_destroy();
   header('location: login.html');
   die();
}
   include_once('dbconnect.php');
$target_path = "assets/images/profile/cover/";
$lastchar4 =  substr($_FILES['fileToUpload']['name'], -4);  
$_FILES['fileToUpload']['name'] = $_SESSION['username'].$lastchar4;
$target_path = $target_path . basename($_FILES['fileToUpload']['name']); 
$imageFileType = pathinfo($target_path,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";

    }
}
if (file_exists($target_path)) {
unlink("$target_path");
   
}
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) 
{
header("location: profile.php");
} 
else
{
    echo "Ops... something went wrong!";
}
?>