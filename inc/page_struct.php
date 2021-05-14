<?php
//function for header and footer in each page
//require_once "inc/functions.php";
session_start();
//$_SESSION["test"] = "test message from session";
//echo $_SESSION['userName']." ".$_SESSION['is_auth'];

// if($_SESSION['is_auth']){
//   $auth = new AuthClass();
// }
  


class PageStruct{

  private $pageName;
  private $pageCon;
  private $isAuth;
  private $isName;

  public function __construct($pageName, $pageCon, $isAuth, $isName){
    $this->name = $pageName;
    $this->con = $pageCon;
    $this->auth = $isAuth;
    $this->userName = $isName;
  }
  public function head(){

    //echo "<h1>$this->auth || $this->userName</h1>";
    echo "
      <html>
      <head>
        <title>{$this->name}</title>
        <link rel=\"stylesheet\" href=\"style/style.css\">
      </head>
      <body>
      <table border =1>
        <tr>
           <td width = 80%>тут нарисовать шапку</td>
           <td>";

           if($this->auth){
             echo "привет, ".$this->userName;
             echo "<br><a href='?is_exit=1'>Выйти</a>";
           }
           else{
            echo " <a href = register.php?event=sign>вход</a>||
             <a href = register.php?event=registration>регистрация</a>";
           }
           echo "</td>
        </tr>
        </table>
      <div class=main>
        <h2>{$this->con}</h2>

        <ul class = my_ul>
         <li>
           <a href=index.php>Главная</a>
         </li>
         <li>
           <a href=python_lang.php>Python help</a>
         </li>
         <li>
           <a href=php_lang.php>PHP help</a>
         </li>
         <li>
           <a href=#>OTHER (if it need)</a>
         </li>
        ";

         if($this->auth){
           echo "<li>
            <a href=add_data.php>Добавить пример</a>
          </li>";
         }

      echo "  </ul><hr noshade>
      </div>";
      if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $_SESSION = array(); //Очищаем сессию
        session_destroy();
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
  }

  public function foot(){
    echo "</body></html>";
  }
}

?>
