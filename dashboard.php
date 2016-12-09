<?php
session_start();

require_once('check_login.inc.php');

if(check_login()===FALSE)
{  session_destroy();
   header('location: login.html');
   die();
}
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/icons/logo.ico" type="image/x-icon">
    <title>Science Duels</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|Neucha|Seymour+One" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="index.html"><h2 id="profile2">Профил</h2></a>
      <a href="profile.php" class="tooltip2"><img id="profile" src="assets/images/icons/profile.png" /><span class="tooltiptext">Профил</span></a>
      <a href="logout.php"><h2 id="out">Излизане</h2></a>
      <h1 class="headline1">Добре дошли в главното меню!</h1>
      <h2 class="headline2">Изберете наука, за да продължите!</h2>
      <div id="line">&nbsp;</div>
    </header>
    <left>
      <div class="tooltip">
        <a href="#"><img id="friends" src="assets/images/icons/friends.png" /></a><span class="tooltiptext">Приятели</span></div>

      <div class="tooltip">
        <a href="#"><img id="notifications" src="assets/images/icons/notifications.png" /></a><span class="tooltiptext">Съобщения</span></div>

      <div class="tooltip">
        <a href="#"><img id="settings" src="assets/images/icons/shop.png" /></a>
        <span class="tooltiptext">Магазин</span></div>
    </left>
    <right>
      <div class="tooltip3">
        <a href="#"><img id="shop" src="assets/images/icons/settings.png" /></a><span class="tooltiptext">Настройки</span></div>
      <div class="tooltip3">
        <a href="AboutUs_home.html"><img id="contact" src="assets/images/icons/contactus.png" /></a><span class="tooltiptext">&#1047;&#1072; &#1085;&#1072;&#1089;</span></div>
      <div class="tooltip3">
        <a href="http://www.hronometur.free.bg"><img id="facebook" src="assets/images/icons/facebook.png" /></a><span class="tooltiptext">Намерете ни във Facebook!</span></div>
    </right>
    <main>
      <div id="icons">
        <a href="member.php" id="physics"><img class="physics" src="assets/images/sciences/physics.png" /></a><span id="P">Физика</span>
        <a href="maths-lobby.php" id="maths"><img class="maths" src="assets/images/sciences/maths.png" /></a><span id="M">Математика</span>
        <a href="member.php" id="chemistry"><img class="chemistry" src="assets/images/sciences/chemistry.png" /></a><span id="C">Химия</span>
        <a href="member.php" id="coding"><img class="coding" src="assets/images/sciences/coding.png" /></a><span id="Cod">Кодиране</span>
      </div>
    </main>
    <footer>
      <div id="line2">&nbsp;</div><br>
      <h2>Scienceduels.tk&copy;</h2>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
  </body>
  <script>
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
  </script>

  </html>