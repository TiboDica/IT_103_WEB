<?php
require("functions.php");

$insert1 = 'insert into `user` (name, firstname, pseudo, email, street, zip_code, city, country, credits, pwd_hash) values ("prout", "prenom", "kirimati", "ibalex.salino@gmail.com", "25, rue des lauriers", "33000", "Bdx", "France", "50", "$2y$10$WtH0XO19nJVD0qWTR2/3HujYHYiDh7G09aB6kzNMl3B.U8YTZurju");'; //pwd : 'jesuisunefleur33'

$insert2 = 'insert into `user` (name, firstname, pseudo, email, street, zip_code, city, country, credits, pwd_hash) values ("Trump", "Donald", "DTrump", "donald.trump@caramail.fr", "33, rue de la soupe", "47589", "TrucMuche", "Luxembourg", "10000", "$2y$10$y8Cw074P2f./tdoDX/9/.uSyXscLQKeez7I/Njmk1g1X6mbMHETiW");'; //pwd : 'ilovemexicansUSA'

$insert3 = 'insert into `match` values ("1", "football", "Football", "Barcelona", "Real Madrid", "2016-08-20", "3", "3", "2");';

$insert4 = 'insert into `match` values ("2", "e-sport", "Starcraft 2", "Jaedong", "MMA", "2016-06-14", "2", "3", "3");';

$insert5 = 'insert into `bet` values ("1", "kirimati", "3", "10");';

$insert6 = 'insert into `bet` values ("2", "kirimati", "3", "5");';

$insert7 = 'insert into `bet` values ("1", "DTrump", "1", "100");';

$insert8 = 'insert into `bet` values ("2", "DTrump", "2", "200");';

$db_con = db_con();


db_query ($db_con, $insert1);

db_query ($db_con, $insert2);

db_query ($db_con, $insert3);

db_query ($db_con, $insert4);

db_query ($db_con, $insert5);

db_query ($db_con, $insert6);

db_query ($db_con, $insert7);

db_query ($db_con, $insert8);

mysqli_close($db_con);
?>
