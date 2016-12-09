<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Science Duels</title>
  <link rel="shortcut icon" href="assets/images/icons/logo.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand|Neucha" rel="stylesheet">
</head>
<body>
  <div class="header">
    <div class="top">
      <h3 class="logo">ScienceDuels</h3>
      <nav>
        <a href="index.html">
          <div class="button-fill grey">
            <div class="button-text">Начало</div>
            <div class="button-inside">
              <div class="inside-text">Начало</div>
            </div>
          </div>
        </a>
        <a href="signup.html">
          <div class="button-fill orange ">
            <div class="button-text ">Регистрация</div>
            <div class="button-inside ">
              <div class="inside-text ">Регистрация</div>
            </div>
          </div>
        </a>
        <a href="AboutUs.html">
          <div class="button-fill orange">
            <div class="button-text">За нас</div>
            <div class="button-inside">
              <div class="inside-text">За&nbsp;нас</div>
            </div>
          </div>
        </a>
      </nav>
    </div>
  </div>
  <center>
    <div id="main">
      <h1>Влизане</h1>
<div class="wrongPass">Опа... Въвели сте грешно име/парола! Опитайте пак
</div>
      <form id="login" role="form" method="post" action="login.php" autocomplete="off">
        <div>
          <input type="text" name="username" placeholder="Потребителско Име" tabindex="1">
        </div>
        <div>
          <input type="password" name="password" placeholder="Парола" tabindex="2">
        </div>
        <div>
          <div>
            <a id="ForgottenPass">Забравена парола?</a>
          </div>
          <div>
            <input id="logButton" type="submit" name="submit" value="Влизане" tabindex="3">
          </div>
        </div>
        <hr style="border-top:1px solid rgba(183, 216, 255,.2);">
        <div>
          <div>
            <a href="signup.html" id="RegisterButton" tabindex="4">Нямате акаунт? Регистрирайте се.</a>
          </div>
        </div>
      </form>
    </div>
  </center>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
    $(".button-fill").hover(function () {
            $(this).children(".button-inside").addClass('full');
        }, function() {
          $(this).children(".button-inside").removeClass('full');
        });
  </script>
</body>
</html>