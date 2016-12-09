<?php

session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 $error = false;
include_once 'dbconnect.php';
		
	$uname = trim($_POST['username']);
	$email = trim($_POST['email']);
	$upass = trim($_POST['password']);
        $passwoddc = trim($_POST['passwordc']);
	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	

$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$uname."'");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    if($row["name"] == $_POST['username']) 
    {
       $error = true;
    $Error = "Username already exists";
//$s=1;
    }

   }
mysql_free_result($result);
//if($s!=1)
//{
 // password validation
  if (empty($upass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($upass) < 6) {
   $error = true;
   $Error = "Password must have atleast 6 characters.";
  }
// password encrypt using SHA256(); 
$upass= hash('sha256', $upass);
// confirm password encrypt using SHA256();
$passwoddc=hash('sha256', $passwoddc);
	$uname = strip_tags($uname);
	$email = strip_tags($email);
	$password = strip_tags($upass);
        $upasswordc = strip_tags($passwoddc);
	$firstname = strip_tags($firstname);
	$lastname = strip_tags($lastname);

// basic name validation
  if (empty($uname)) {
   $error = true;
   $Error = "Please enter username.";
  } else if (strlen($uname) < 3) {
   $error = true;
   $Error = "username must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z1-9]+$/",$uname)) {
   $error = true;
   $Error = "username must contain english alphabets.";
  }
  
if (empty($firstname)) {
   $error = true;
   $Error = "Please enter your name.";
  } else if (strlen($firstname) < 3) {
   $error = true;
   $Error = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z]+$/",$firstname)) {
   $error = true;
   $Error = "Name must contain english alphabets";
  }
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $lError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT email FROM users WHERE email='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $Error = "Provided Email is already in use.";
   }
  }
 
     
      

                if($password===$upasswordc && !$error)
{	
          session_regenerate_id(true);
          
          $_SESSION['username']=$uname;
          $_SESSION['is_loged']=TRUE;
          $_SESSION['IP']=md5($SERVER['REMOTE_ADDR']);
	// check email exist or not
	$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then proceed
	
	if ($count==0) {
		
		$query = "INSERT INTO users(name,email,password,coins,level,rank,firstname,lastname,gamesplayed,gameswon,gameslost,premium,imgformat)     VALUES('$uname','$email','$password','10','1','Beginner','$firstname','$lastname',0,0,0,0,'')";
		
		
		$res = mysql_query($query);
		
		if ($res) {
			
session_regenerate_id(true);
          
          $copy2[user] ="assets/images/profile/".$_SESSION['username'].".jpg";copy('assets/images/no-photo.jpg', 'assets/images/profile/no-photo.jpg');
          rename("assets/images/profile/no-photo.jpg", $copy2[user]); 
          $copy3[user] ="assets/images/profile/cover/".$_SESSION['username'].".jpg";copy('assets/images/placeholder-images.jpg', 'assets/images/profile/cover/placeholder-images.jpg');
          rename("assets/images/profile/cover/no-photo.jpg", $copy3[user]); 
          header("location: dashboard.php");
          exit();
			
		} 
			
	} 
	
}

  //     }
  echo $Error; 

?>
		