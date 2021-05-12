<?php
require_once "inc/page_struct.php";
require_once "inc/db.php";
require_once "inc/functions.php";



$page = new PageStruct("Помощник по PHP", "Добавление проекта");
$page->head();

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
                            <textarea name=bigMessage rows=15 cols=60></textarea>
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
else{
  $lang = $_POST['language'];
  $selection = $_POST['selection'];
  $subject = $_POST['subject'];
  $link1 = $_POST['link1'];
  $link2 = $_POST['link2'];
  $bigMessage = $_POST['bigMessage'];

  
}
$page->foot();
?>
