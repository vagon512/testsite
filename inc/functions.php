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
?>
