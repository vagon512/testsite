<?php
require_once "inc/page_struct.php";

$page = new PageStruct("Помощник по ЯПам", "Добро пожаловать в помощник");
$page->head();
?>
<p class=my_p>
	Помощь по языкам программирования от IT TROJAN!
</p>
<?php 
  echo "<form action = index.php method=post>
        login:
         <input type=text name=login maxlength=23 size = 25>
         <br>
         password:
         <input type=password name=passwd size=20>
         <br>
         <input type=submit value=GO>
         </form>
         <br>
         <a href=register.php>Registration</a>";
  if($_POST['login']){
  	echo $_POST['login'];
  }

$page->foot();
?>