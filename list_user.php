<?php
require_once "inc/page_struct.php";
require_once "inc/db.php";

$page = new PageStruct("Помощник по PHP", "Список польователей");
$page->head();

$querySelectUser = "SELECT userName, userPatronymic, userSirname, userLogin, userEmail FROM users";

$result = $mysqli->query($querySelectUser);

if(!$result){
	echo "Error: can`t select data";
}
else{
	echo "<table border=1>";
	echo "<tr>
                <td>Фамилия</td>
                <td>Имя</td>
                <td>Отчество</td>
                <td>Логин</td>
                <td>электронка</td>
          </tr>";
	while($row = $result->fetch_assoc()){
       echo "<tr>
                <td>".$row["userSirname"]."</td>
                <td>".$row["userName"]."</td>
                <td>".$row["userPatronymic"]."</td>
                <td>".$row["userLogin"]."</td>
                <td>".$row["userEmail"]."</td>
              </tr>";
	}
	echo "</table>";
}

$page->foot();
?>