<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors',1);
//ini_set('error_reporting', E_ALL);
require_once "inc/page_struct.php";
//require_once "inc/db.php";
//


$page = new PageStruct("Помощник по ЯПам", "Добро пожаловать в помощник", $_SESSION['is_auth'], $_SESSION['userName']);
$page->head();
?>
<p class=my_p>
	Помощь по языкам программирования от IT TROJAN!
</p>
<p>Тут надо придумать текстовку для чего все это нужно</p>
<?php 
 
  
// echo $_SESSION['idUser']."====".$_SESSION['userName'];
$page->foot();
?>
