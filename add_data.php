<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors',1);
// ini_set('error_reporting', E_ALL);
require_once "inc/page_struct.php";
require_once "inc/db.php";
require_once "inc/functions.php";



$page = new PageStruct("Помощник по ЯПам", "Добро пожаловать в помощник", $_SESSION['is_auth'], $_SESSION['userName']);
$page->head();
if(!$_SESSION['is_auth']){
	echo "Для добавления примеров необходимо <a href=register.php?event=sign>авторизоваться</a><br>
	Если у Вас нет аккаунта, то можете <a href=register.php?event=registration>зарегистрироваться</a>";
}
else{

	//$listLang = new language();
$formStart = "<div class = my_p><form action=add_data.php method=POST>
          <input type = hidden name = seenform value = y>
		  <table>
		    <tr>
			  <td>Используемый язык:
			  </td>
			  <td>";
			 
$formFinish = "</td>
			</tr>
			<tr>
			  <td>selections</td>
			  <td>
                           <input type = text name = selections size = 40>
                          </td>
			</tr>
			<tr>
			  <td>subject</td>
			  <td>
                            <input type = text name = subject size = 40>
                          </td>
			</tr>
			<tr>
			  <td>Links to </td>
			  <td><input type = text name = link1 size = 40></td>
			</tr>
			<tr>
			  <td>links to </td>
			  <td><input type = text name = link2 size = 40></td>
			</tr>
			<tr>
			  <td colspan = 2 align = right>
                            <textarea class=\"content\" name=text rows=15 cols=60></textarea>
                          </td>
			</tr>
                        <tr>
                          <td colspan = 2 align = right>
                            <input type = submit value = send>
                          </td>
                        </tr>
		  </table>
		 </form>
               </div>";
if(!$_POST['seenform']){
	echo $formStart;
	listLang();
	echo $formFinish;
}
//обработка формы
else{
  $lang = $_POST['language'];
  $selection = $_POST['selections'];
  $subject = $_POST['subject'];
  $link1 = $_POST['link1'];
  $link2 = $_POST['link2'];
  $_POST['text'] = str_replace('"', '\"', $_POST['text']);
  $_POST['text'] = str_replace('<', '&lt;', $_POST['text']);
  $_POST['text'] = str_replace('>', '&gt;', $_POST['text']);
  //echo $_POST['text'];
  $bigMessage = "<code>".$_POST['text']."</code>";
  $userID = $_SESSION['idUser'];

  $queryInsertProject = "INSERT INTO project VALUES(0, $userID, \"$lang\", \"$selection\", \"$subject\", \"$link1\", \"$link2\", \"$bigMessage\")";

  // echo $bigMessage;
  // echo $queryInsertProject;
  $result = $mysqli->query($queryInsertProject);
  if(!$result){
  	echo "error insert project";
  }

  else{
  	echo "All OK";
  }


  
}
}

$page->foot();
?>
