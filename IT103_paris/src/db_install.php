<?php
require("functions.php");


// sql request for the creation of table "user"
$qTbUser = "CREATE TABLE IF NOT EXISTS `user` (
   `name` varchar(25) NOT NULL,
   `firstname` varchar(25) NOT NULL,
   `pseudo` varchar(25) NOT NULL,
   `email` varchar(100) NOT NULL,
   `street` varchar(100) NOT NULL,
   `zip_code` int(11) NOT NULL,
   `city` varchar(50) NOT NULL,
   `country` varchar(50) NOT NULL,
   `credits` float(11) NOT NULL DEFAULT '0',
   `pwd_hash` varchar(255) NOT NULL,
   PRIMARY KEY (`pseudo`)
 ) ENGINE=InnoDB;";

// sql request for the creation of table "match"
$qTbMatch = "CREATE TABLE IF NOT EXISTS `match` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(25) NOT NULL,
  `sport` varchar(25) NOT NULL,
  `team1` varchar(25) NOT NULL,
  `team2` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `odds1` float(11) NOT NULL,  
  `odds2` float(11) NOT NULL,  
  `draw` float(11) NOT NULL, 
  `res_type` int(11) NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB;";

// sql request for the creation of table "bet"
$qTbBet = "CREATE TABLE IF NOT EXISTS `bet` (
  `ref` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `bet_type` int(2) NOT NULL,
  `bet_amount` int(11) NOT NULL,
  PRIMARY KEY (`ref`,`pseudo`),
  FOREIGN KEY (`pseudo`) REFERENCES `user`(`pseudo`),
  FOREIGN KEY (`ref`) REFERENCES `match`(`ref`)
) ENGINE=InnoDB;";


$db_con = db_con();

echo "Creation of the table user<br />";
db_query($db_con, $qTbUser);

echo "Creation of the table match<br />";
db_query($db_con, $qTbMatch);

echo "Creation of the table bet<br />";
db_query($db_con, $qTbBet);

mysqli_close($db_con);
?>
