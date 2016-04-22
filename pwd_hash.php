<?php
$option = [
  'cost' => 10,
];
// pwd kirimati
$hash = password_hash('jesuisunefleur33', PASSWORD_BCRYPT, $option); // exemple : $2y$10$WtH0XO19nJVD0qWTR2/3HujYHYiDh7G09aB6kzNMl3B.U8YTZurju
echo "$hash <br />";
if (password_verify('jesuisunefleur33', $hash)){
  echo 'ok <br />';
}
else {
  echo 'ko <br />';
}

$hash = password_hash('ilovemexicansUSA', PASSWORD_BCRYPT, $option); // exemple : $2y$10$y8Cw074P2f./tdoDX/9/.uSyXscLQKeez7I/Njmk1g1X6mbMHETiW
echo "$hash <br />";
if (password_verify('ilovemexicansUSA', $hash)){
  echo 'ok <br />';
}
else {
  echo 'ko <br />';
}

 ?>
