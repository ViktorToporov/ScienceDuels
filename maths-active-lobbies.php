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
    <link rel="stylesheet" href="assets/css/maths-active-lobbies.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|Neucha|Seymour+One" rel="stylesheet">
</head>
<body>
<div id="bg">
<div id="options">
<div id="optbuttons">
<div class="dropdown">
  <button onclick="location.reload();" class="dropbtn">Опресняване</button>
</div>

<div class="dropdown">
  <button class="dropbtn">Брой Въпроси:</button>
  <div class="dropdown-content">
    <a href="#"><strong>1</strong> Въпроса</a>
    <a href="#"><strong>3</strong> Въпроси</a>
    <a href="#"><strong>5</strong> Въпроси</a>
    <a href="#"><strong>7</strong> Въпроси</a>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn">Трудност:</button>
  <div class="dropdown-content">
    <a href="#">Много Лесна</a>
    <a href="#">Лесна</a>
    <a href="#">Средна</a>
    <a href="#">Трудна</a>
  </div>
</div>
<div class="dropdown">
  <a href="#openModal"><button class="dropbtn" id="add">Създаване на лоби</button></a>
</div>

<!--Start Of Create Page-->
<div id="openModal" class="modalDialog">
    <div><a href="#close" title="Close" class="close">X</a>

        	<center><h2 id="modal-heading1">Създаване на лоби</h2>
               <h4 id="modal-heading">Попълнете всички полета</h4>



<div id='container'>  
<div class='cell'><div class='button'>Име на лобито:</div></div>
  <div class='cell' ><input id="newlobby-name" maxlength="8" type='search' placeholder='Не повече от 8 букви!'></div>
  
</div>
<div class="none" id="container-dif">  
<div class='cell'><div class='button'>Трудност на задачите:</div></div>
  <div class='cell'><select id="newlobby-dif">
    <option value="no" selected>Изберете:</option>
    <option value="Много Лесна">Много Лесна</option>
    <option value="Лесна">Лесна</option>
    <option value="Средна">Средна</option>
    <option value="Трудна">Трудна</option>
</select></div>
  
</div>
<div class="none" id="container-dif2">  
<div class='cell'><div class='button'>Брой задачи:</div></div>
  <div class='cell'><select id="newlobby-mode">
    <option value="no" selected>Изберете:</option>
    <option value="1">1</option>
    <option value="3">3</option>
    <option value="5">5</option>
    <option value="7">7</option>
</select></div>
  
</div>
<br>
<div>

<a id="nazad" class="button-arrow none" onclick="nazad();"><span class="span-arrow" >Назад!</span></a>
  <a id="napred" class="button-arrow" onclick="napred();"><span class="span-arrow" >Напред!</span></a>
<a id="napred2" class="button-arrow none" onclick="napred2();"><span class="span-arrow">Напред!</span></a>

<form role="form"  target=_parent method="POST" action="addloby.php" class="inline-block">

<input class="none" id="name-lobby10" name="name-lobby10"></input>
<input class="none" id="dif-lobby10" name="dif-lobby10"></input>
<input class="none" id="mode-lobby10" name="mode-lobby10"></input>
<input type="submit" id="suzday" class="span-arrow none" onclick="create()" value="Създай!"></input>
</form>

</div>
<h3 class="none" id="final-newlobby-name">a</h3><h3  class="none" id="final-newlobby-dif">b</h3>
</center>
</div>
    </div>
</div>
<!--End Of Create Page-->

</div>
</div>
<div id="lobbies">
  <ul id="list">
  </ul>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
$link = mysql_connect("localhost:3306", "crazyde_SD_users", "users123");
mysql_select_db("crazyde_SD_users", $link);
$names = mysql_query("SELECT * FROM maths", $link);
$num_rows = mysql_num_rows($names);
while ($row = mysql_fetch_array($names, MYSQL_ASSOC)){
    echo '<script> var nameid;$("document").ready(function(){$("ul").prepend("<li><div id=name><h3>Име на лоби:&nbsp;</h3><h3 id=n>';
print($row["name"]);

echo '</h3></div><div id=user1><h3>Играч #1:&nbsp;</h3><h3>';
print($row["user1"]);
echo '</h3></div><div id=user2><h3>Играч #2:&nbsp;</h3><h3>';
print($row["user2"]);
echo '</h3></div><div id=dif><h3>Трудност:&nbsp;</h3><h3 id=Cdif>';
print($row["difficulty"]);
echo '</h3></div><div id=time><h3>Брой въпроси:&nbsp;</h3><h3>';
print($row["gamemode"]);
echo '</h3></div><center><form class=buttonform target=_parent role=form action=proba.php><button  type=submit  id=';
print($row["user1"]);
echo ' class=button-two onclick=nameid=this.id;><a><span>Влизане</span></a></button></form></center></li>");});</script>';
}
?>

<script>
$(".show").on("click", function(){
  $(".mask").addClass("active");
});

// Function for close the Modal

function closeModal(){
  $(".mask").removeClass("active");
}

// Call the closeModal function on the clicks/keyboard

$(".close, .mask").on("click", function(){
  closeModal();
});

$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    closeModal();
  }
});
</script>

<script>

$( document ).ready(function() {
    $("button").click(function()
{
var asd = (this.id);

   $.ajax({
     url: 'mama.php',
     type: "POST",
     dataType:'json',
     data: ({name: nameid}),
     success: function(data){
         console.log(data);
     }

 
}); 
});



});

</script>

<script>
try{Typekit.load();}catch(e){}
function napred(){
var name = document.getElementById('newlobby-name');
var name2 = document.getElementById('final-newlobby-name');
name2.innerHTML=name.value;
name2 = name2.innerHTML;
if (name2==="")
{
alert("Моля въведете име на лоби!");
}
else{
document.getElementById("name-lobby10").value =name2;
document.getElementById("nazad").className = "";
document.getElementById("nazad").className = "button-arrow";
document.getElementById("nazad").className += " inline-block";
document.getElementById("container").className = "none";
document.getElementById("container-dif").className = "block";
document.getElementById("napred").className = "";
document.getElementById("napred").className = "button-arrow";
document.getElementById("napred").className += " none";
document.getElementById("napred2").className = "";
document.getElementById("napred2").className = " button-arrow ";
document.getElementById("napred2").className += " inline-block";
}
}

function napred2(){
var dif = document.getElementById('newlobby-dif');
var dif2 = document.getElementById('dif-lobby10');
dif3 =dif.options[dif.selectedIndex].value;
if(dif3 === "no")
{alert("Моля изберете трудност!");}
else{
dif2.value=dif.options[dif.selectedIndex].value;
document.getElementById("nazad").className = "";
document.getElementById("nazad").className = "button-arrow";
document.getElementById("nazad").className += " inline-block";
document.getElementById("container").className = "none";
document.getElementById("container-dif").className = "none";
document.getElementById("napred").className = "";
document.getElementById("napred").className = "button-arrow";
document.getElementById("napred").className += " none";
document.getElementById("container-dif2").className = "block";
document.getElementById("suzday").className = "";
document.getElementById("suzday").className = " button-arrow ";
document.getElementById("suzday").className += " inline-block";
document.getElementById("napred2").className = "";
document.getElementById("napred2").className = "button-arrow";
document.getElementById("napred2").className += " none";
}
}
function create(){
var mode = document.getElementById('newlobby-mode');
var mode2 = document.getElementById('mode-lobby10');
gm =mode.options[mode.selectedIndex].value;
if(gm === "no")
{
alert("Моля изберете брой задачи!");
}
else{


mode2.value=mode.options[mode.selectedIndex].value;
document.getElementById('suzday').href="#close";
document.getElementById("container-dif2").className = " none";

//IZTRIVANE NA OPCIITE
document.getElementById("nazad").className = "";
document.getElementById("nazad").className = "button-arrow";
document.getElementById("nazad").className += " none";
document.getElementById("napred").className = "";
document.getElementById("napred").className = "button-arrow";
document.getElementById("napred").className += " inline-block";
document.getElementById("suzday").className = "";
document.getElementById("suzday").className = " button-arrow ";
document.getElementById("suzday").className += " none";
document.getElementById("container").className = "block";
document.getElementById("container-dif").className = "none";
document.getElementById('newlobby-name').value="";
dif.value="no";
}
}

function nazad(){
document.getElementById("container-dif").className = "";
document.getElementById("container-dif").className = "none";
document.getElementById("container-dif2").className = "";
document.getElementById("container-dif2").className = "none";
document.getElementById("container").className = "";
document.getElementById("container").className = "block";
document.getElementById("nazad").className = "";
document.getElementById("nazad").className = "button-arrow";
document.getElementById("nazad").className = " none";
document.getElementById("napred").className = "";
document.getElementById("napred").className = "button-arrow";
document.getElementById("napred").className += " inline-block";
document.getElementById("suzday").className = "";
document.getElementById("suzday").className = " button-arrow ";
document.getElementById("suzday").className += " none";
document.getElementById("napred2").className = "";
document.getElementById("napred2").className = " button-arrow ";
document.getElementById("napred2").className += " none";
}

</script>
</body>
<script>
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>
</html>	