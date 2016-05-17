<?php
require("functions.php");

$dpUser = "DROP TABLE `user`;";

$dpMatch = "DROP TABLE `match`;";

$dpBet = "DROP TABLE `bet`;";

$db_con = db_con();

// Drop table bet
db_query($db_con, $dpBet);

// Drop table user
db_query($db_con, $dpUser);

// Drop table match
db_query($db_con, $dpMatch);

mysqli_close($db_con);
?>
