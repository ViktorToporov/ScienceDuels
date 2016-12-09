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
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/icons/logo.ico" type="image/x-icon">
    <title>Science Duels</title>
    <link rel="stylesheet" href="assets/css/maths-lobby.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|Neucha|Seymour+One" rel="stylesheet">
</head>
<body>
  <header>
          	<div class="sub-main">
      <form action="dashboard.php"><button type="submit" class="button-two" ><a><span>Меню</span></a></button></form?>
    </div>
<h1 class="headline">&#1042;&#1083;&#1077;&#1079;&#1090;&#1077; &#1074; &#1083;&#1086;&#1073;&#1080; &#1080;&#1083;&#1080; &#1089;&#1098;&#1079;&#1076;&#1072;&#1081;&#1090;&#1077; &#1085;&#1086;&#1074;&#1086;, &#1079;&#1072; &#1076;&#1072; &#1079;&#1072;&#1087;&#1086;&#1095;&#1085;&#1077;&#1090;&#1077; &#1076;&#1091;&#1077;&#1083;!</h1>
</header>
<left>
<?php $df = $_SESSION['username'].".jpg"; $image = "assets/images/profile/".$df;   ?> <img id="profile-img" src="<?php printf($image);  ?>" >
<div id="info">
<strong><h1 id="level">1</h1></strong>
<div class="meter">
			<span style="width: 50%"></span>
		</div>
<h3><?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s", $row["name"]);  
}
mysql_free_result($result);

?></h3>
           <h3  id="rank-label">&#1056;&#1072;&#1085;&#1082;:&nbsp;</h3>
         
<h3 id="rank">
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["rank"]);  
}
mysql_free_result($result);

?></h3>
             
              <h3 id="coins-label">&#1042;&#1080;&#1088;&#1090;&#1091;&#1072;&#1083;&#1085;&#1080; &#1087;&#1072;&#1088;&#1080;:&nbsp;</h3>
              
 <h3 id="coins">
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["coins"]); 
    
}
mysql_free_result($result);

?></h3>
</div>
</left>
<right>
</right>
  <main>
<iframe src="maths-active-lobbies.php"
  </main>
  <footer>
<h2 id="website">Scienceduels.tk&copy;</h2>
  </footer>
 <script src="assets/js/jquery.min.js"></script>
<script>
        $(".button-fill").hover(function () {
            $(this).children(".button-inside").addClass('full');
        }, function() {
          $(this).children(".button-inside").removeClass('full');
        });
        </script>
      <script>
        $("#slideshow > div:gt(0)").hide();
        setInterval(function() { 
          $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
        },  3000);
      </script>
<script>
		$(function() {
			$(".meter > span").each(function() {
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			});
		});
	</script>

</body>
<script>
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>
</html>	