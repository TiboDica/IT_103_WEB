<?php
include("functions.php");


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
   `credits` int(11) NULL,
   `pwd_hash` varchar(255) NOT NULL,
   PRIMARY KEY (`pseudo`)
 ) ENGINE=InnoDB;";

// sql request for the creation of table "match"
$qTbMatch = "CREATE TABLE IF NOT EXISTS `match` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `sport` varchar(25) NOT NULL,
  `team1` varchar(25) NOT NULL,
  `team2` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `odds1` int(3) NOT NULL,  /*il faut mettre un float */
  `odds2` int(3) NOT NULL,  /*il faut mettre un float */
  `draw` int(3) NOT NULL,   /*il faut mettre un float */
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB;";

// sql request for the creation of table "bet"
$qTbBet = "CREATE TABLE IF NOT EXISTS `bet` (
  `ref` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `bet_team` varchar(25) NOT NULL,
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
