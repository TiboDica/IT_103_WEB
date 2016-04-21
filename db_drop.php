<?php
include("functions.php");

$dpUser = "DROP TABLE user;";

$dpMatch = "DROP TABLE match;";

$dpBet = "DROP TABLE bet;";

$db_con = db_con();

// Drop table user (FONCTIONNE BIEN)
db_query($db_con, $dpUser);

// Drop table match (NE MARCHE PAS ÇA ME LES BRISE !!!!)
db_query($db_con, $dpMatch);

// Drop table bet (PAREIL !!!!!)
db_query($db_con, $dpBet);

mysqli_close($db_con);
?>
