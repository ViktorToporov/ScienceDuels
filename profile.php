<?php
session_start();

require_once('check_login.inc.php');

if(check_login()===FALSE)
{  session_destroy();
   header('location: login.html');
   die();
}
      include_once('dbconnect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/cover.min.css">
    <link rel="stylesheet" href="assets/css/main.min.css">
    <link rel="stylesheet" href="assets/css/ns-default.css">
    <link rel="stylesheet" href="assets/css/ns-style-growl.css">
 <link rel="stylesheet" href="assets/css/ns-default.css">
</head>
<body>
  
  <div id="header-home">
                    <div class="inner">
                        
                       <a href="dashboard.php"><h3 id="back" class="masthead-brand" style=" font-size: 2.5em;text-decoration: none;">&nbsp; &#8592; Back&nbsp;</h3></a>
                        <nav>
                            <ul class="nav masthead-nav" style="margin-right:5%;">
                                <h3 class="masthead-brand" style="font-size: 4em;">CodeDuels</h3>
                            </ul>
                        </nav>
                    </div>
   <form  action="uploadcover.php"  method="post" enctype="multipart/form-data">
    Select image to upload:
    <input  type="file" name="fileToUpload" id="fileToUpload">
    <input style = "margin-bottom:10%" type="submit" value="Upload Image" name="submit">
    </form> 
<?php $df = $_SESSION['username'].".jpg"; $image = "assets/images/profile/cover/".$df;   ?> 
<img src="<?php printf($image);  ?>" class="cover">
       <div class="profile-gray">


    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>
 <?php $df = $_SESSION['username'].".jpg"; $image = "assets/images/profile/".$df;   ?>    <img id="profile-img" style="margin-top:-20%;" src="<?php printf($image);  ?>" >
          <center><table class="profile-table">
               <tr>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   
           <td> <h2>Games Won:&nbsp;</h2></td> 
           </td><td><h2>
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["gameswon"]);  
}
mysql_free_result($result);

?></h2></td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td><h2>Games Lost:&nbsp;</h2></td>
           <td><h2>
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["gameswon"]);  
}
mysql_free_result($result);

?></h2></td>
               <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td><h2>Level:&nbsp;</h2></td>
           <td><h2>
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["level"]);  
}
mysql_free_result($result);

?></h2></td>
               <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td><h2>Rank:&nbsp;</h2></td>
           <td><h2>
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["rank"]);  
}
mysql_free_result($result);

?></h2></td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td> <h2 style="text-align: right;">Coins:&nbsp;</h2></td>
              <td> <h2 style="text-align: right;">
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["coins"]); 
    
}
mysql_free_result($result);

?></h2></td>
              </tr>
           </table></center> 
      </div>
       
        <br><br><br><br>
    <div class="bio" id="profile-main">
        <h1>Bio:</h1>
        <div id="info"><h1>This is your bio. Here you can add personal information you would like users to see when viewing your profile.</h1><a style="cursor:pointer;"></a></div>
        <br>
        
    </div>
    <div id="profile-main">
           <center><table id="table-profile">
          <tr>
              <td>
                  <h2>Username:&nbsp;</h2>
              </td>
              <td>
                  <i>
                      <h2  style="text-align:right;"> <?php 
echo $_SESSION['username'];


?>  </h2>
                  </i>
              </td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a style="cursor:pointer;"><img src="assets/images/icons/edit.png" style="width: 25%; " onmouseover="this.src='assets/images/icons/edit2.png';" onmouseout="this.src='assets/images/icons/edit.png';" onclick= "<input type="text" name="firstname"> 

 <form>
  
  
</form>
</a>    
               </td>
         </tr>
          <tr>
               <td>
                   <h2>Real Name:&nbsp;</h2>
               </td>
               <td>
                   <i>
                      <h2 style="text-align:right;">
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s %s", $row["firstname"], $row["lastname"]);  
}
mysql_free_result($result);

?></h2>
                   </i>
               </td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;
                 <a style="cursor:pointer;"> <img src="assets/images/icons/edit.png" style="width: 25%; " onmouseover="this.src='assets/images/icons/edit2.png';" onmouseout="this.src='assets/images/icons/edit.png';"/></a>
          </tr>
           
           <tr>
               <td>
                   <h2>Email:&nbsp;</h2>
               </td>
               <td>
                   <i>
                       <a style="text-decoration: none; text-align:right;"><h2>
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s", $row["email"]);  
}
mysql_free_result($result);

?></h2></a>
                   </i>
               </td>
               <td>&nbsp;&nbsp;&nbsp;&nbsp;
                   <a style="cursor:pointer;"><img src="assets/images/icons/edit.png" style="width: 25%; " onmouseover="this.src='assets/images/icons/edit2.png';" onmouseout="this.src='assets/images/icons/edit.png';"/></a>
               </td>
          </tr>
               <tr>
              <td>
                   <h2>Website:&nbsp;</h2>
               </td>
               <td>
                   <i>
                       <a style="text-decoration: none; text-align:right;"><h2>www.codeduels.tk</h2></a>
                   </i>
               </td>
               <td>&nbsp;&nbsp;&nbsp;&nbsp;
                   <a style="cursor:pointer;"><img src="assets/images/icons/edit.png" style="width: 25%; " onmouseover="this.src='assets/images/icons/edit2.png';" onmouseout="this.src='assets/images/icons/edit.png';"/></a>
              </td>
              
          </tr>
         
            </table></center> 
  </div>
    <br>
    <br>
    
    
    
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/mainFast.min.js"></script>
   
    
</body>

</html>