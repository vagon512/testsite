<?php

$registrationForm= "<table border=0>
        <form action=register.php?event=".$event." method=post>
          <input type=hidden name=seenform value=y>
          <tr>
            <td>Фамилия</td>
            <td>
              <input type=text name=userSirname size=20 maxlength=30>
            </td>
          </tr>
          <tr>
            <td>Имя</td>
            <td>
              <input type=text name=userName size=20 maxlength=30>
            </td>
          </tr>
          <tr>
            <td>Отчество</td>
            <td>
              <input type=text name=userPatronymic size=20 maxlength=30>
            </td>
          </tr>
          <tr>
            <td>Логин</td>
            <td>
              <input type=text name=userLogin size=20 maxlength=20>
            </td>
          </tr>
          <tr>
            <td>Пароль</td>
            <td>
              <input type=password name=userPassword size=20>
            </td>
          </tr>
          <tr>
            <td>Пароль еще раз</td>
            <td>
              <input type=password name=userPasswordAgain size=20>
            </td>
          </tr>
          <tr>
            <td>e-mail</td>
            <td>
              <input type=text name=userEmail size=20>
            </td>
          </tr>
          <tr>
            <td colspan=2>
              <input type=submit value = регистрация>
            </td>
          </tr>
          </form>
          </table>
        ";
if(!$_POST['seenform']){
	echo $registrationForm;
}
else{
	if($_POST['userPassword']!=$_POST['userPasswordAgain']){

		echo "<p class= error>Пароли не совпадают</p>";
		echo $registrationForm;
	}
	else{
		$userName = $_POST['userName'];
		$userSirname = $_POST['userSirname'];
		$userPatronymic = $_POST['userPatronymic'];
		$userLogin = $_POST['userLogin'];
		$userEmail = $_POST['userEmail'];
		$userPassword = $_POST['userPassword'];

		

		$queryInsertUser = "INSERT INTO users values(0, \"$userName\", \"$userPatronymic\", \"$userSirname\", \"$userLogin\",
		md5(\"$userPassword\"), \"$userEmail\")";

		echo $queryInsertUser;

		$result = $mysqli->query($queryInsertUser);
		if(!$result){
			echo "error when isert to database";
		}
		else{
			echo "All OK";
		}

	}
}

?>