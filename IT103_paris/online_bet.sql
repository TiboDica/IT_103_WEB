-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 17, 2016 at 09:50 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `online_bet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bet`
--

CREATE TABLE `bet` (
  `ref` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `bet_type` int(2) NOT NULL,
  `bet_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bet`
--

INSERT INTO `bet` (`ref`, `pseudo`, `bet_type`, `bet_amount`) VALUES
(1, 'DTrump', 1, 100),
(1, 'kirimati', 3, 10),
(3, 'DTrump', 1, 30),
(4, 'DTrump', 1, 10),
(5, 'bla', 1, 50),
(5, 'DTrump', 2, 60),
(7, 'DTrump', 2, 27),
(7, 'kirimati', 3, 100),
(9, 'DTrump', 2, 13),
(9, 'kirimati', 3, 1000),
(10, 'DTrump', 1, 58),
(11, 'DTrump', 3, 167),
(12, 'DTrump', 1, 27),
(13, 'DTrump', 1, 20),
(15, 'DTrump', 1, 32),
(16, 'DTrump', 3, 9),
(17, 'DTrump', 3, 48),
(20, 'DTrump', 2, 37),
(23, 'DTrump', 1, 26),
(24, 'DTrump', 3, 25),
(28, 'DTrump', 1, 14),
(29, 'DTrump', 1, 48),
(30, 'DTrump', 3, 15),
(32, 'DTrump', 3, 12),
(34, 'DTrump', 1, 26),
(35, 'DTrump', 1, 24),
(36, 'DTrump', 3, 59),
(37, 'DTrump', 3, 16),
(38, 'DTrump', 3, 16),
(39, 'DTrump', 1, 16),
(40, 'DTrump', 2, 25),
(41, 'DTrump', 1, 32),
(42, 'DTrump', 3, 4),
(43, 'DTrump', 1, 37),
(44, 'DTrump', 3, 43),
(47, 'DTrump', 1, 32),
(49, 'DTrump', 3, 89),
(55, 'bla', 1, 30),
(55, 'DTrump', 1, 26),
(55, 'kirimati', 3, 130),
(62, 'bla', 1, 87),
(62, 'kirimati', 2, 50),
(76, 'DTrump', 1, 24),
(80, 'kirimati', 1, 70),
(84, 'kirimati', 1, 5),
(86, 'DTrump', 3, 25);

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `ref` int(11) NOT NULL,
  `cat` varchar(25) NOT NULL,
  `sport` varchar(25) NOT NULL,
  `team1` varchar(25) NOT NULL,
  `team2` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `odds1` float NOT NULL,
  `odds2` float NOT NULL,
  `draw` float NOT NULL,
  `res_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`ref`, `cat`, `sport`, `team1`, `team2`, `date`, `odds1`, `odds2`, `draw`, `res_type`) VALUES
(1, 'football', 'Football', 'Barcelona', 'Real Madrid', '2016-08-20', 1.27, 6.49, 96.44, 3),
(3, 'football', 'Football', 'AC Milan', 'PSG', '2016-08-19', 1.24, 96.44, 96.44, 2),
(4, 'football', 'Football', 'Nantes', 'Chelsea', '2016-09-20', 1.24, 96.44, 96.44, 3),
(5, 'e-sport', 'Starcraft 2', 'Jaedong', 'MMA', '2016-06-14', 1.68, 96.44, 1.52, 1),
(6, 'e-sport', 'Starcraft 2', 'Invasion Esport', 'yoe Flash Wolves', '2016-07-15', 96.44, 96.44, 96.44, 3),
(7, 'e-sport', 'Starcraft 2', 'EURONICS Gaming', 'Ting', '2016-07-02', 96.44, 1.33, 2.82, 2),
(8, 'e-sport', 'League of Legends', 'SKT T1', 'Fnatic', '2016-09-08', 96.44, 96.44, 96.44, 3),
(9, 'e-sport', 'League of Legends', 'LDG', 'KOO Tigers', '2016-07-07', 96.44, 1.24, 96.44, 1),
(10, 'e-sport', 'League of Legends', 'KOO Tigers', 'Origen', '2016-07-06', 1.24, 96.44, 96.44, 1),
(11, 'tennis', 'Tennis', 'Novak Djokovic', 'Kei Nishikori', '2016-06-14', 96.44, 1.24, 96.44, 1),
(12, 'tennis', 'Tennis', 'Lucas Pouille', 'Andy Murray', '2016-07-12', 1.24, 96.44, 96.44, 3),
(13, 'tennis', 'Tennis', 'Serena Williams', 'Irina-Camelia Begu', '2016-08-04', 1.24, 96.44, 96.44, 2),
(14, 'tennis', 'Tennis', 'Rodger Federer', 'Raphael Nadal', '2016-08-04', 96.44, 96.44, 96.44, 1),
(15, 'basketball', 'Basketball', 'Golden State Warr.', 'Houston Rockets', '2016-09-29', 1.24, 96.44, 96.44, 3),
(16, 'basketball', 'Basketball', 'Toronto Raptors', 'Indiana Pacers', '2016-09-28', 96.44, 1.24, 96.44, 2),
(17, 'basketball', 'Basketball', 'Cleveland Cavalie.', 'Detroit Pistons', '2016-07-02', 96.44, 1.24, 96.44, 1),
(20, 'rugby', 'Rugby', 'Agen', 'Oyonnax', '2016-07-12', 96.44, 96.44, 1.24, 1),
(21, 'rugby', 'Rugby', 'Toulon', 'La Rochelle', '2016-08-03', 96.44, 96.44, 96.44, 1),
(22, 'handball', 'Handball', 'Chartres', 'Tours', '2016-09-23', 96.44, 96.44, 96.44, 1),
(23, 'handball', 'Handball', 'Ivry', 'Tremblay', '2016-09-17', 1.24, 96.44, 96.44, 2),
(24, 'handball', 'Handball', 'Dunkerque', 'Aix', '2016-09-17', 96.44, 1.24, 96.44, 3),
(25, 'handball', 'Handball', 'Nantes', 'Montpellier', '2016-09-17', 96.44, 96.44, 96.44, 1),
(26, 'ice-hockey', 'Ice Hockey', 'St. Louis Blues', 'San Jose Sharks', '2016-09-02', 96.44, 96.44, 96.44, 2),
(27, 'ice-hockey', 'Ice Hockey', 'Tampa Bay Lightning', 'Pittsburgh Penguins', '2016-09-15', 96.44, 96.44, 96.44, 2),
(28, 'ice-hockey', 'Ice Hockey', 'Buffalo Sabres', 'Nashville Predators', '2016-09-15', 1.24, 96.44, 96.44, 1),
(29, 'ice-hockey', 'Ice Hockey', 'Vancouver Canucks', 'Ottawa Senators', '2016-08-23', 1.24, 96.44, 96.44, 2),
(30, 'volley-ball', 'Volley-Ball', 'AS Cannes', 'Narbonne', '2016-08-18', 96.44, 1.24, 96.44, 3),
(32, 'volley-ball', 'Volley-Ball', 'Paris', 'Nantes-Reze', '2016-07-24', 96.44, 1.24, 96.44, 3),
(34, 'volley-ball', 'Volley-Ball', 'Lyon', 'Toulouse', '2016-09-27', 1.24, 96.44, 96.44, 1),
(35, 'baseball', 'Baseball', 'Baltimore Orioles', 'Chicago Cubs', '2016-08-13', 1.24, 96.44, 96.44, 1),
(36, 'baseball', 'Baseball', 'Chicago White Sox', 'Boston Red Sox', '2016-09-22', 96.44, 1.24, 96.44, 2),
(37, 'baseball', 'Baseball', 'Los Angeles Angels', 'Minnesota Twins', '2016-09-16', 96.44, 1.24, 96.44, 3),
(38, 'baseball', 'Baseball', 'Oakland Athletics', 'Pittsburgh Pirates', '2016-10-05', 96.44, 1.24, 96.44, 1),
(39, 'fighting-sport', 'Boxing', 'Tyson Fury', 'Mayweather', '2016-07-03', 1.24, 96.44, 96.44, 2),
(40, 'fighting-sport', 'Boxing', 'Sugar Ray', 'Djelkhir', '2016-08-28', 96.44, 96.44, 1.24, 1),
(41, 'fighting-sport', 'Boxing', 'Alvarez', 'DeGale', '2016-07-25', 1.24, 96.44, 96.44, 1),
(42, 'fighting-sport', 'Judo', 'Pinot', 'Gahie', '2016-06-24', 96.44, 1.24, 96.44, 2),
(43, 'fighting-sport', 'Judo', 'Le Blouch', 'Riner', '2016-07-16', 1.24, 96.44, 96.44, 3),
(44, 'fighting-sport', 'Judo', 'Clerge', 'Andeol', '2016-08-12', 96.44, 1.24, 96.44, 2),
(45, 'football', 'Football', 'Barcelona', 'Real Madrid', '2016-08-20', 96.44, 96.44, 96.44, 3),
(46, 'football', 'Football', 'PSG', 'Manchester United', '2016-09-12', 96.44, 96.44, 96.44, 1),
(47, 'football', 'Football', 'AC Milan', 'PSG', '2016-08-19', 1.24, 96.44, 96.44, 2),
(48, 'football', 'Football', 'Nantes', 'Chelsea', '2016-09-20', 96.44, 96.44, 96.44, 3),
(49, 'e-sport', 'Starcraft 2', 'Jaedong', 'MMA', '2016-06-14', 96.44, 1.24, 96.44, 1),
(50, 'e-sport', 'Starcraft 2', 'Invasion Esport', 'yoe Flash Wolves', '2016-07-15', 96.44, 96.44, 96.44, 3),
(51, 'e-sport', 'Starcraft 2', 'EURONICS Gaming', 'Ting', '2016-07-02', 96.44, 96.44, 96.44, 2),
(52, 'e-sport', 'League of Legends', 'SKT T1', 'Fnatic', '2016-09-08', 96.44, 96.44, 96.44, 3),
(53, 'e-sport', 'League of Legends', 'LDG', 'KOO Tigers', '2016-07-07', 96.44, 96.44, 96.44, 1),
(54, 'e-sport', 'League of Legends', 'KOO Tigers', 'Origen', '2016-07-06', 96.44, 96.44, 96.44, 1),
(55, 'tennis', 'Tennis', 'Novak Djokovic', 'Kei Nishikori', '2016-06-14', 2.15, 1.38, 96.44, 1),
(56, 'tennis', 'Tennis', 'Lucas Pouille', 'Andy Murray', '2016-07-12', 96.44, 96.44, 96.44, 3),
(57, 'tennis', 'Tennis', 'Serena Williams', 'Irina-Camelia Begu', '2016-08-04', 96.44, 96.44, 96.44, 2),
(58, 'tennis', 'Tennis', 'Rodger Federer', 'Raphael Nadal', '2016-08-04', 96.44, 96.44, 96.44, 1),
(59, 'basketball', 'Basketball', 'Golden State Warr.', 'Houston Rockets', '2016-09-29', 96.44, 96.44, 96.44, 3),
(60, 'basketball', 'Basketball', 'Toronto Raptors', 'Indiana Pacers', '2016-09-28', 96.44, 96.44, 96.44, 2),
(61, 'basketball', 'Basketball', 'Cleveland Cavalie.', 'Detroit Pistons', '2016-07-02', 96.44, 96.44, 96.44, 1),
(62, 'rugby', 'Rugby', 'Racing 92', 'Saracens', '2016-06-20', 1.43, 96.44, 1.9, 3),
(63, 'rugby', 'Rugby', 'Bordeaux-Begles', 'Toulouse', '2016-06-27', 96.44, 96.44, 96.44, 3),
(64, 'rugby', 'Rugby', 'Agen', 'Oyonnax', '2016-07-12', 96.44, 96.44, 96.44, 1),
(65, 'rugby', 'Rugby', 'Toulon', 'La Rochelle', '2016-08-03', 96.44, 96.44, 96.44, 1),
(66, 'handball', 'Handball', 'Chartres', 'Tours', '2016-09-23', 96.44, 96.44, 96.44, 1),
(67, 'handball', 'Handball', 'Ivry', 'Tremblay', '2016-09-17', 96.44, 96.44, 96.44, 2),
(68, 'handball', 'Handball', 'Dunkerque', 'Aix', '2016-09-17', 96.44, 96.44, 96.44, 3),
(69, 'handball', 'Handball', 'Nantes', 'Montpellier', '2016-09-17', 96.44, 96.44, 96.44, 1),
(70, 'ice-hockey', 'Ice Hockey', 'St. Louis Blues', 'San Jose Sharks', '2016-09-02', 96.44, 96.44, 96.44, 2),
(71, 'ice-hockey', 'Ice Hockey', 'Tampa Bay Lightning', 'Pittsburgh Penguins', '2016-09-15', 96.44, 96.44, 96.44, 2),
(72, 'ice-hockey', 'Ice Hockey', 'Buffalo Sabres', 'Nashville Predators', '2016-09-15', 96.44, 96.44, 96.44, 1),
(73, 'ice-hockey', 'Ice Hockey', 'Vancouver Canucks', 'Ottawa Senators', '2016-08-23', 96.44, 96.44, 96.44, 2),
(74, 'volley-ball', 'Volley-Ball', 'AS Cannes', 'Narbonne', '2016-08-18', 96.44, 96.44, 96.44, 3),
(75, 'volley-ball', 'Volley-Ball', 'Poitiers', 'Montpellier', '2016-09-08', 96.44, 96.44, 96.44, 2),
(76, 'volley-ball', 'Volley-Ball', 'Paris', 'Nantes-Reze', '2016-07-24', 1.24, 96.44, 96.44, 3),
(77, 'volley-ball', 'Volley-Ball', 'Sete', 'Ajaccio', '2016-08-19', 96.44, 96.44, 96.44, 2),
(79, 'baseball', 'Baseball', 'Baltimore Orioles', 'Chicago Cubs', '2016-08-13', 96.44, 96.44, 96.44, 1),
(80, 'baseball', 'Baseball', 'Chicago White Sox', 'Boston Red Sox', '2016-09-22', 1.24, 96.44, 96.44, 2),
(81, 'baseball', 'Baseball', 'Los Angeles Angels', 'Minnesota Twins', '2016-09-16', 96.44, 96.44, 96.44, 3),
(82, 'baseball', 'Baseball', 'Oakland Athletics', 'Pittsburgh Pirates', '2016-10-05', 96.44, 96.44, 96.44, 1),
(83, 'fighting-sport', 'Boxing', 'Tyson Fury', 'Mayweather', '2016-07-03', 96.44, 96.44, 96.44, 2),
(84, 'fighting-sport', 'Boxing', 'Sugar Ray', 'Djelkhir', '2016-08-28', 1.24, 96.44, 96.44, 1),
(85, 'fighting-sport', 'Boxing', 'Alvarez', 'DeGale', '2016-07-25', 96.44, 96.44, 96.44, 1),
(86, 'fighting-sport', 'Judo', 'Pinot', 'Gahie', '2016-06-24', 96.44, 1.24, 96.44, 2),
(87, 'fighting-sport', 'Judo', 'Le Blouch', 'Riner', '2016-07-16', 96.44, 96.44, 96.44, 3),
(88, 'fighting-sport', 'Judo', 'Clerge', 'Andeol', '2016-08-12', 96.44, 96.44, 96.44, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `credits` float NOT NULL DEFAULT '0',
  `pwd_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `firstname`, `pseudo`, `email`, `street`, `zip_code`, `city`, `country`, `credits`, `pwd_hash`) VALUES
('salut', 'cÃ©cool', 'bla', 'in.out@gmail.com', '103 cours de la mer', 33780, 'asdfasdfasdc', 'france', 12340500, '$2y$10$tf/ADSSy8adTa7A4BzZvbO7O.gyrRI7ge1vAaESvSSz8tc7Onctbm'),
('Trump', 'Donald', 'DTrump', 'donald.trump@caramail.fr', '33, rue de la soupe', 47589, 'TrucMuche', 'Luxembourg', 8741, '$2y$10$y8Cw074P2f./tdoDX/9/.uSyXscLQKeez7I/Njmk1g1X6mbMHETiW'),
('prout', 'prenom', 'kirimati', 'ibalex.salino@gmail.com', '25, rue des lauriers', 33000, 'Bdx', 'France', 997695, '$2y$10$WtH0XO19nJVD0qWTR2/3HujYHYiDh7G09aB6kzNMl3B.U8YTZurju');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bet`
--
ALTER TABLE `bet`
  ADD PRIMARY KEY (`ref`,`pseudo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bet`
