<?php
require("functions.php");

// USER
$insert1 = 'insert into `user` (name, firstname, pseudo, email, street, zip_code, city, country, credits, pwd_hash) values ("prout", "prenom", "kirimati", "ibalex.salino@gmail.com", "25, rue des lauriers", "33000", "Bdx", "France", "50", "$2y$10$WtH0XO19nJVD0qWTR2/3HujYHYiDh7G09aB6kzNMl3B.U8YTZurju");'; //pwd : 'jesuisunefleur33'
$insert2 = 'insert into `user` (name, firstname, pseudo, email, street, zip_code, city, country, credits, pwd_hash) values ("Trump", "Donald", "DTrump", "donald.trump@caramail.fr", "33, rue de la soupe", "47589", "TrucMuche", "Luxembourg", "10000", "$2y$10$y8Cw074P2f./tdoDX/9/.uSyXscLQKeez7I/Njmk1g1X6mbMHETiW");'; //pwd : 'ilovemexicansUSA'

// MATCH
// foot
$insert3 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("football", "Football", "Barcelona", "Real Madrid", "2016-08-20", "1", "1", "1");';
$insert4 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("football", "Football", "PSG", "Manchester United", "2016-09-12", "1", "1", "1");';
$insert5 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("football", "Football", "AC Milan", "PSG", "2016-08-19", "1", "1", "1");';
$insert6 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("football", "Football", "Nantes", "Chelsea", "2016-09-20", "1", "1", "1");';
// esport
$insert7 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("e-sport", "Starcraft 2", "Jaedong", "MMA", "2016-06-14", "1", "1", "1");';
$insert8 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("e-sport", "Starcraft 2", "Invasion Esport", "yoe Flash Wolves", "2016-07-15", "1", "1", "1");';
$insert9 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("e-sport", "Starcraft 2", "EURONICS Gaming", "Ting", "2016-07-02", "1", "1", "1");';
$insert10 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("e-sport", "League of Legends", "SKT T1", "Fnatic", "2016-09-08", "1", "1", "1");';
$insert11 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("e-sport", "League of Legends", "LDG", "KOO Tigers", "2016-07-07", "1", "1", "1");';
$insert12 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("e-sport", "League of Legends", "KOO Tigers", "Origen", "2016-07-06", "1", "1", "1");';
// tennis
$insert13 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("tennis", "Tennis", "Novak Djokovic", "Kei Nishikori", "2016-06-14", "1", "1", "1");';
$insert14 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("tennis", "Tennis", "Lucas Pouille", "Andy Murray", "2016-07-12", "1", "1", "1");';
$insert15 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("tennis", "Tennis", "Serena Williams", "Irina-Camelia Begu", "2016-08-04", "1", "1", "1");';
$insert16 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("tennis", "Tennis", "Rodger Federer", "Raphael Nadal", "2016-08-04", "1", "1", "1");';
// basktball
$insert17 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("basketball", "Basketball", "Golden State Warr.", "Houston Rockets", "2016-09-29", "1", "1", "1");';
$insert18 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("basketball", "Basketball", "Toronto Raptors", "Indiana Pacers", "2016-09-28", "1", "1", "1");';
$insert19 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("basketball", "Basketball", "Cleveland Cavalie.", "Detroit Pistons", "2016-07-02", "1", "1", "1");';
// rugby
$insert20 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("rugby", "Rugby", "Racing 92", "Saracens", "2016-06-20", "1", "1", "1");';
$insert21 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("rugby", "Rugby", "Bordeaux-Begles", "Toulouse", "2016-06-27", "1", "1", "1");';
$insert22 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("rugby", "Rugby", "Agen", "Oyonnax", "2016-07-12", "1", "1", "1");';
$insert23 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("rugby", "Rugby", "Toulon", "La Rochelle", "2016-08-03", "1", "1", "1");';
// handball
$insert24 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("handball", "Handball", "Chartres", "Tours", "2016-09-23", "1", "1", "1");';
$insert25 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("handball", "Handball", "Ivry", "Tremblay", "2016-09-17", "1", "1", "1");';
$insert26 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("handball", "Handball", "Dunkerque", "Aix", "2016-09-17", "1", "1", "1");';
$insert27 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("handball", "Handball", "Nantes", "Montpellier", "2016-09-17", "1", "1", "1");';
// Ice hockey
$insert28 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("ice-hockey", "Ice Hockey", "St. Louis Blues", "San Jose Sharks", "2016-09-02", "1", "1", "1");';
$insert29 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("ice-hockey", "Ice Hockey", "Tampa Bay Lightning", "Pittsburgh Penguins", "2016-09-15", "1", "1", "1");';
$insert30 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("ice-hockey", "Ice Hockey", "Buffalo Sabres", "Nashville Predators", "2016-09-15", "1", "1", "1");';
$insert31 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("ice-hockey", "Ice Hockey", "Vancouver Canucks", "Ottawa Senators", "2016-08-23", "1", "1", "1");';
// volley ball
$insert32 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("volley-ball", "Volley-Ball", "AS Cannes", "Narbonne", "2016-08-18", "1", "1", "1");';
$insert33 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("volley-ball", "Volley-Ball", "Poitiers", "Montpellier", "2016-09-08", "1", "1", "1");';
$insert34 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("volley-ball", "Volley-Ball", "Paris", "Nantes-Reze", "2016-07-24", "1", "1", "1");';
$insert35 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("volley-ball", "Volley-Ball", "Sete", "Ajaccio", "2016-08-19", "1", "1", "1");';
$insert36 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("volley-ball", "Volley-Ball", "Lyon", "Toulouse", "2016-09-27", "1", "1", "1");';
// baseball
$insert37 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("baseball", "Baseball", "Baltimore Orioles", "Chicago Cubs", "2016-08-13", "1", "1", "1");';
$insert38 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("baseball", "Baseball", "Chicago White Sox", "Boston Red Sox", "2016-09-22", "1", "1", "1");';
$insert39 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("baseball", "Baseball", "Los Angeles Angels", "Minnesota Twins", "2016-09-16", "1", "1", "1");';
$insert40 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("baseball", "Baseball", "Oakland Athletics", "Pittsburgh Pirates", "2016-10-05", "1", "1", "1");';
// fighting sport
$insert41 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("fighting-sport", "Boxing", "Tyson Fury", "Mayweather", "2016-07-03", "1", "1", "1");';
$insert42 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("fighting-sport", "Boxing", "Sugar Ray", "Djelkhir", "2016-08-28", "1", "1", "1");';
$insert43 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("fighting-sport", "Boxing", "Alvarez", "DeGale", "2016-07-25", "1", "1", "1");';
$insert44 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("fighting-sport", "Judo", "Pinot", "Gahie", "2016-06-24", "1", "1", "1");';
$insert45 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("fighting-sport", "Judo", "Le Blouch", "Riner", "2016-07-16", "1", "1", "1");';
$insert46 = 'insert into `match` (cat, sport, team1, team2, date, odds1, odds2, draw) values ("fighting-sport", "Judo", "Clerge", "Andeol", "2016-08-12", "1", "1", "1");';

// BET
$insert47 = 'insert into `bet` values ("1", "kirimati", "3", "10");';
$insert48 = 'insert into `bet` values ("2", "kirimati", "3", "5");';
$insert49 = 'insert into `bet` values ("1", "DTrump", "1", "100");';
$insert50 = 'insert into `bet` values ("2", "DTrump", "2", "200");';


$db_con = db_con();

db_query ($db_con, $insert1);
db_query ($db_con, $insert2);
db_query ($db_con, $insert3);
db_query ($db_con, $insert4);
db_query ($db_con, $insert5);
db_query ($db_con, $insert6);
db_query ($db_con, $insert7);
db_query ($db_con, $insert8);
db_query ($db_con, $insert9);
db_query ($db_con, $insert10);
db_query ($db_con, $insert11);
db_query ($db_con, $insert12);
db_query ($db_con, $insert13);
db_query ($db_con, $insert14);
db_query ($db_con, $insert15);
db_query ($db_con, $insert16);
db_query ($db_con, $insert17);
db_query ($db_con, $insert18);
db_query ($db_con, $insert19);
db_query ($db_con, $insert20);
db_query ($db_con, $insert21);
db_query ($db_con, $insert22);
db_query ($db_con, $insert23);
db_query ($db_con, $insert24);
db_query ($db_con, $insert25);
db_query ($db_con, $insert26);
db_query ($db_con, $insert27);
db_query ($db_con, $insert28);
db_query ($db_con, $insert29);
db_query ($db_con, $insert30);
db_query ($db_con, $insert31);
db_query ($db_con, $insert32);
db_query ($db_con, $insert33);
db_query ($db_con, $insert34);
db_query ($db_con, $insert35);
db_query ($db_con, $insert36);
db_query ($db_con, $insert37);
db_query ($db_con, $insert38);
db_query ($db_con, $insert39);
db_query ($db_con, $insert40);
db_query ($db_con, $insert41);
db_query ($db_con, $insert42);
db_query ($db_con, $insert43);
db_query ($db_con, $insert44);
db_query ($db_con, $insert45);
db_query ($db_con, $insert46);
db_query ($db_con, $insert47);
db_query ($db_con, $insert48);
db_query ($db_con, $insert49);
db_query ($db_con, $insert50);

mysqli_close($db_con);

$bets = list_bets();
foreach ($bets as $bet) {
	oddsEvaluation($bet['ref']);
}
?>
