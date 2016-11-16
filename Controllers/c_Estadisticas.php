<?php
echo "Disfruta el cancer";

$i = 0;

foreach ($_POST['arrayID'] as $it) {

  echo '<br>';
  echo $it;
  echo ' --- ';

if(!isset($_POST['arrayStats'][$i]))
  echo '0';
else
  echo $_POST['arrayStats'][$i];

echo '<br>';
  echo '---------------------------------------';
  $i++;

}


?>
