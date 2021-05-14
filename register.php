<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
ini_set('error_reporting', E_ALL);

require_once "inc/page_struct.php";
require_once "inc/db.php";
require_once "inc/functions.php";


$event = $_GET['event'];



$page = new PageStruct("Помощник по ЯПам", "Добро пожаловать в помощник", $_SESSION['is_auth'], $_SESSION['userName']);
$page->head();
?>
<div class=my_p>


<?php


if($event=="registration"){
  require_once "inc/reg.php";
}
	
if($event=="sign"){
	require_once "inc/enter.php";
}

if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}

?>
</div>
<?php
$page->foot();
?>
