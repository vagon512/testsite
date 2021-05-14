<?php
function listLang(){
  $langName = array('C++', 'C#', 'C', 'Java', 'PHP', 'Python', 'JavaScript');
  echo "<select name = language>
          <option value='no'>Select language</option>";
  foreach($langName as $Name){
    echo "<option value = \"$Name\">".$Name."</option>";
  }
  echo "</select>";

}

class AuthClass {
    private $_login; //Устанавливаем логин
    private $_password; //Устанавливаем пароль
 
    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
    public function __construct($_login, $_password){
    	$this->_login = $_login;
    	$this->_password = $_password;
    }
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
     
    /**
     * Авторизация пользователя
     * @param string $login
     * @param string $passwors 
     */
    public function auth($login, $passwors) {
    	$dbUser = "vagon";
$dbPassword = "1";
$dbHost = "localhost";
$dbBase = "itTrojan";

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbBase);
		if($mysqli->connect_error){
			printf("Соединение не удалось: %s\n", $mysqli->connect_error);
  			exit();
		}
    	$querySelectUser = "SELECT * FROM users WHERE userLogin=\"$login\" AND userPassword=md5(\"$passwors\")";

    	$result = $mysqli->query($querySelectUser);

    	if(!$result){
		  echo "error select user";
		  $_SESSION["is_auth"] = false;
		  return false; 
	    }
	    else{
		  while($row = $result->fetch_assoc()){
			$_SESSION["idUser"] = $row['idUser'];
			$_SESSION["Login"] = $row["userLogin"];
			$_SESSION["userName"] = $row['userName'];
			$_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
			
		  } 
          echo $_SESSION['userName']." Вы успешно вошли в систему!";
		  return true;
	    }
        
    }
     
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
     
     
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}
 
//$auth = new AuthClass();
 
// if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
//     if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
//         echo "<h2 style="color:red;">Логин и пароль введен не правильно!</h2>";
//     }
// }
 
// if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
//     if ($_GET["is_exit"] == 1) {
//         $auth->out(); //Выходим
//         header("Location: ?is_exit=0"); //Редирект после выхода
//     }
//}
?>
