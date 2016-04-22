<?php
echo "salut";
include(functions.php);
$email = 'ibalex.salino@gmail.com';
$pwd = 'jesuisunefleur33';
if (auth($email, $pwd)){
  echo 'ok';
}
else {
  echo 'ko';
}

?>
