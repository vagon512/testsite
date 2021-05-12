<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
ini_set('error_reporting', E_ALL);
require_once "inc/page_struct.php";
require_once "inc/db.php";

$page = new PageStruct("Помощник по ЯПам", "Добро пожаловать в помощник");
$page->head();
?>
<p class=my_p>
	Помощь по языкам программирования от IT TROJAN!
</p>
<?php 
 if(!$_POST['seenform']){
  echo "<form action = index.php method=post>
         <input type = hidden name = seenform value = true>
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
         // echo $_POST["seenform"];
}
if($_POST['seenform']){
	$login = $_POST['login'];
	$password = $_POST['passwd'];

	$querySelectUser = "SELECT * FROM users WHERE userLogin = \"$login\" AND userPassword = md5(\"$password\")";

    // echo $querySelectUser;
	$result = $mysqli->query($querySelectUser);
	if(!$result){
		echo "error select user";
	}
	else{
		while($row = $result->fetch_assoc()){
			$_SESSION["idUser"] = $row['idUser'];
			$_SESSION["Login"] = $row["userLogin"];
			$_SESSION["userName"] = $row['userName'];
			echo $_SESSION['userName']." Вы успешно вошли в систему!";
		}
	}
}
  
// echo $_SESSION['idUser']."====".$_SESSION['userName'];
$page->foot();
?>