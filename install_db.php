<?php
include("config.php");
include("functions.php");


// sql request for the creation of table "user"
$qTbUser = "CREATE TABLE IF NOT EXISTS `user` (
   `pseudo` varchar(25) NOT NULL,
   `email` varchar(100) NOT NULL,
   `credits` int(11),
   `pwd_hash` varchar(255) NOT NULL,
   PRIMARY KEY (`pseudo`)
 ) ENGINE=InnoDB;";

// sql request for the creation of table "match"
$qTbMatch = "CREATE TABLE IF NOT EXISTS `match` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `sport` varchar(25) NOT NULL,
  `team1` varchar(25) NOT NULL,
  `team2` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `odds1` int(3) NOT NULL,
  `odds2` int(3) NOT NULL,
  `draw` int(3) NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB;";

// sql request for the creation of table "bet"
$qTbBet = "CREATE TABLE IF NOT EXISTS `bet` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `bet_team` varchar(25) NOT NULL,
  `bet_amount` int(11),
  PRIMARY KEY (`ref`,`pseudo`)
) ENGINE=InnoDB;";


$connexion_db = connexion_db();


echo "Creation of the table user";
mysqli_query($connexion_db, $qTbUser);
echo mysqli_info($connexion_db);
echo mysqli_error($connexion_db);

echo "Creation of the table match";
mysqli_query($connexion_db, $qTbMatch);
echo mysqli_info($connexion_db);
echo mysqli_error($connexion_db);

echo "Creation of the table bet";
mysqli_query($connexion_db, $qTbBet);
echo mysqli_info($connexion_db);
echo mysqli_error($connexion_db);

mysqli_close($connexion_db);
?>
