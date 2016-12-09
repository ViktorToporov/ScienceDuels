<?php
session_start();

require_once('check_login.inc.php');

if(check_login()===FALSE)
{  session_destroy();
   header('location: login.html');
   die();
}


	error_reporting( ~E_ALL & ~E_DEPRECATED &  ~E_NOTICE );

	
	define('DBHOST', 'localhost:3306');
	define('DBUSER', 'crazyde_SD_users');
	define('DBPASS', 'users123');
	define('DBNAME', 'crazyde_SD_users');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://scienceduels.tk/assets/images/icons/logo.ico" type="image/x-icon">
    <title>Science Duels</title>

    <link rel="stylesheet" href="http://scienceduels.tk/assets/css/duel.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|Neucha|Seymour+One" rel="stylesheet">
  </head>

  <body>
    <header>
      <div class="sub-main">
        <center>
          <h2>Изберете внимателно правилният отговор и когато сте готови натиснете бутона "Потвърди"!</h2>
          <h1>Рунд 1 от 3</h1></center>

      </div>
    </header>
    <left>
      <center>
        <h1>Вие:</h1></center>
      <?php $df = $_SESSION['username'].".jpg"; $image = "http://scienceduels.tk/assets/images/profile/".$df;   ?> <img id="profile-img" src="<?php printf($image);  ?>">
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
        <h3 id="rank-label">&#1056;&#1072;&#1085;&#1082;:&nbsp;</h3>

        <h3 id="rank">
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["rank"]);  
}
mysql_free_result($result);

?></h3>

      </div>
    </left>

    <right>
      <center>
        <h1>Опонента:</h1></center>
      <?php $df = $_SESSION['sda'].".jpg"; $image = "http://scienceduels.tk/assets/images/profile/".$df;   ?> <img id="profile-img" src="<?php printf($image);  ?>">
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
        <h3 id="rank-label">&#1056;&#1072;&#1085;&#1082;:&nbsp;</h3>

        <h3 id="rank">
<?php 
$result = mysql_query("SELECT * FROM  `users` WHERE  `name`  LIKE  '".$_SESSION['username']."'");

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    printf("%s ", $row["rank"]);  
}
mysql_free_result($result);

?></h3>
      </div>
    </right>
    <main>
    </main>
    <footer>
      <center>
        <div id="buttons">
          <button href="http://scienceduels.tk/maths-lobby.php" class="button1">Предавам се!</button>
          <button class="button1">Информация</button>
          <button class="button1">Съобщение</button>
        </div>
      </center>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
      //random question
      function getRandomUrl(urls) {
          var minIndex = 0;
          var maxIndex = urls.length - 1;
          var randomIndex = Math.floor(Math.random() * (maxIndex - minIndex)) + minIndex;
          return urls[randomIndex];
      }
      
      var urls = [
      "/maths/questions/question1.php",
      "/maths/questions/question2.php",
      "/maths/questions/question3.php"];
      
      var randomSelectedUrl = getRandomUrl(urls);
      
      $("main").html(
      "<iframe src='" + randomSelectedUrl + "'></iframe>");
      
      $(".show").on("click", function(){
        $(".mask").addClass("active");
      });
            
      function closeModal(){
        $(".mask").removeClass("active");
      }
      
      $(".close, .mask").on("click", function(){
        closeModal();
      });
      
      $(document).keyup(function(e) {
        if (e.keyCode == 27) {
          closeModal();
        }
      });
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function () {
          history.pushState(null, null, document.URL);
      });
    </script>


  </body>

  </html>