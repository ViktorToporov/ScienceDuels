<?php
  session_start();
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$user = "crazyde_SD_users";
$pass = "users123";
$dbname = "crazyde_SD_users";
$conn = mysqli_connect($servername, $user, $pass, $dbname);
if (!$conn) {
    die("Can't connect to the server: " . mysqli_connect_error());
	echo "error";
}
     
      
      $username = $_POST["username"];
      $password = $_POST["password"];
      
$password = hash('sha256', $password );
      
      $sql = "SELECT * FROM  `users` WHERE  `name`  LIKE  '".$username."'  AND  `password` LIKE  '".$password."' ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      
		
      if($count == 1) {
          session_regenerate_id(true);
          
          $_SESSION['username']=$username;
          $_SESSION['is_loged']=TRUE;
          $_SESSION['IP']=md5($SERVER['REMOTE_ADDR']);
          header("location: dashboard.php");
          exit();
   
         
      }
      else 
      {
     header("location: loginerror.php");
     
}
   }
?>