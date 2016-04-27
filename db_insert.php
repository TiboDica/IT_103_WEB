<?php
include("functions.php");

$insert1 = 'insert into `user` values ("kirimati", "ibalex.salino@gmail.com", "50", "$2y$10$WtH0XO19nJVD0qWTR2/3HujYHYiDh7G09aB6kzNMl3B.U8YTZurju");';

$insert2 = 'insert into `user` values ("DTrump", "donald.trump@caramail.fr", "10000", "$2y$10$y8Cw074P2f./tdoDX/9/.uSyXscLQKeez7I/Njmk1g1X6mbMHETiW");';

$insert3 = 'insert into `match` values ("1", "Football", "Barcelona", "Real Madrid", "13/06/2016", "3", "3", "2");';

$insert4 = 'insert into `match` values ("2", "Starcraft 2", "Jaedong", "MMA", "14/06/2016", "2", "3", "3");';

$insert5 = 'insert into `bet` values ("1", "kirimati", "Jaedong", "10");';

$insert6 = 'insert into `bet` values ("2", "kirimati", "Barcelona", "5");';

$insert7 = 'insert into `bet` values ("1", "DTrump", "Draw", "100");';

$insert8 = 'insert into `bet` values ("2", "DTrump", "Draw", "200");';

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
