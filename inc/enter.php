<?php

if(!$_POST['seenform']){
  echo "<form action = register.php?event=".$event." method=post>
         <input type = hidden name = seenform value = true>
        login:
         <input type=text name=login maxlength=23 size = 25>
         <br>
         password:
         <input type=password name=passwd size=20>
         <br>
         <input type=submit value=GO>
         </form>
         ";
         //echo $_POST["seenform"];
}
else{
	$login = $_POST['login'];
	$password = $_POST['passwd'];
	//echo "<h1>".$login."</h1>";
    $auth = new AuthClass($login, $password);
    $auth->auth($login, $password);
    //echo $_SESSION['isAuth'];
    header('Refresh: 3; url=/index.php');
    //$auth->getLogin();
	//$querySelectUser = "SELECT * FROM users WHERE userLogin = \"$login\" AND userPassword = md5(\"$password\")";

    // echo $querySelectUser;
	// $result = $mysqli->query($querySelectUser);
	// if(!$result){
	// 	echo "error select user";
	// }
	// else{
	// 	while($row = $result->fetch_assoc()){
	// 		$_SESSION["idUser"] = $row['idUser'];
	// 		$_SESSION["Login"] = $row["userLogin"];
	// 		$_SESSION["userName"] = $row['userName'];
	// 		echo $_SESSION['userName']." Вы успешно вошли в систему!";
	// 	}
	// }
}
?>