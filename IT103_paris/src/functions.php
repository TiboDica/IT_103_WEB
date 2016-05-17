<?php
include("config.php");

// Return name of website (as set in config.php).
function siteTitle() {
	return $GLOBALS['siteTitle'];
}

// Open a connexion to the database.
function db_con()	{
	$con = mysqli_connect($GLOBALS['dbServ'], $GLOBALS['dbUser'], $GLOBALS['dbPass'], $GLOBALS['dbName']);
	if(! $con ){
		echo 'Could not complete db connection<br />';
	}
	return $con;
}


// Execute a database operation.
function db_query($con, $query){
	$db_query = mysqli_query($con, $query);
	if(! $db_query ){
  	echo 'Could not complete db operation<br />';
	}
	else {
		echo "Db operation completed successfully<br />";
	}
	return $db_query;
}

// Generate hash from a password
function pwd_hash($pwd){
	$option = [
	  'cost' => 10,
	];
	return password_hash($pwd, PASSWORD_BCRYPT, $option);
}


// Verify email and password submitted
function auth($email, $pwd) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `email`, `pwd_hash` FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	if($email == $assoc['email']){
	  if (password_verify($pwd, $assoc['pwd_hash'])){
	    return true;
	  }
	  else {
	    return false;
	  }
	}
	else {
	  return false;
	}
}

// Verify whether an user with the submitted email is already registered or not
function isAlreadyRegistered($email) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `email` FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	if($assoc == 0) {
	    return false;
	} else {
		return true;
	}
}

// Verify whether a pseudo is already used or not
function pseudoIsTaken($pseudo) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `pseudo` FROM user WHERE pseudo = ?");
	mysqli_stmt_bind_param($stmt, 's', $pseudo);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	if($assoc == 0) {
	    return false;
	} else {
		return true;
	}
}

// Register a new user into db
function register($name, $firstname, $pseudo, $email, $street, $zip_code, $city, $country, $pwd_hash) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, 'INSERT INTO `user` (name, firstname, pseudo, email, street, zip_code, city, country ,pwd_hash) VALUES (?,?,?,?,?,?,?,?,?)');
	mysqli_stmt_bind_param($stmt, 'sssssisss', $name, $firstname, $pseudo, $email, $street, $zip_code, $city, $country, $pwd_hash);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// Update user informations into db
function userUpdate($pseudo, $street, $zip_code, $city, $country) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, 'UPDATE `user` SET `street` = ?, `zip_code` = ?, `city` = ?, `country` = ? WHERE `pseudo` = ?');
	mysqli_stmt_bind_param($stmt, 'sisss', $street, $zip_code, $city, $country, $pseudo);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// return pseudo of user when connected
function pseudo($email){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `pseudo` FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc['pseudo'];
}

// return user
function user($email){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `name`, `firstname`, `pseudo`, `email`, `street`, `zip_code`, `city`, `country` FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc;
}

// return remaining credits of user
function remaining_credits($pseudo){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `credits` FROM `user` WHERE `pseudo` = ?");
	mysqli_stmt_bind_param($stmt, 's', $pseudo);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc['credits'];
}

// add credits to a user
function add_credits($pseudo, $credits) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `credits` FROM user WHERE pseudo = ?");
	mysqli_stmt_bind_param($stmt, 's', $pseudo);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	$stmt = mysqli_prepare($db_con, "UPDATE `user` SET `credits` = ? WHERE `pseudo` = ?");
	$credits = $credits + $assoc['credits'];
	mysqli_stmt_bind_param($stmt, 'ds', $credits, $pseudo);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// return list of all current matchs
function list_bets(){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT * FROM `match` ORDER BY `date` ASC");
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_all($res, MYSQLI_ASSOC);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc;
}

// return list of current matchs
function list_betsCat($cat){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT * FROM `match` WHERE `cat` = ? ORDER BY `date` ASC");
	mysqli_stmt_bind_param($stmt, 's', $cat);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_all($res, MYSQLI_ASSOC);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc;
}

// return a specific match
function match($ref){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT * FROM `match` WHERE `ref` = ?");
	mysqli_stmt_bind_param($stmt, 'i', $ref);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc;
}

// return all bets and match that user betted on
function betsUser($pseudo) {
	$db_con = db_con();
	$stmt2 = mysqli_prepare($db_con, "SELECT * FROM `bet` INNER JOIN `match` ON `bet`.ref = `match`.ref WHERE `bet`.`pseudo` = ? ORDER BY `match`.`date` ASC");
	mysqli_stmt_bind_param($stmt2, 's', $pseudo);
	mysqli_stmt_execute($stmt2);
	$res2 = mysqli_stmt_get_result($stmt2);
	$assoc2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);
	mysqli_free_result($res2);
	mysqli_close($db_con);
	return $assoc2;
}

// return a specific match that user betted on
function betUser($pseudo, $ref) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT * FROM `bet` WHERE `pseudo` = ? AND `ref` = ? ");
	mysqli_stmt_bind_param($stmt, 'si', $pseudo, $ref);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc;
}

// return all bet of a specific match
function betMatch($ref) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT * FROM `bet` WHERE `ref` = ? ");
	mysqli_stmt_bind_param($stmt, 'i', $ref);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_all($res, MYSQLI_ASSOC);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc;
}

// return whether a user has betted on a specific match or not
function userHasBetted($pseudo, $ref) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT IFNULL(COUNT(*),0) AS count FROM `bet` WHERE ref = ? AND pseudo = ?");
	mysqli_stmt_bind_param($stmt, 'is', $ref, $pseudo);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	return ($assoc['count'] != 0);
}

// return the percentage of people that betted on a specific choice
function percentBet($ref, $type) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT IFNULL(SUM(`bet_amount`), 0) FROM `bet` WHERE `ref` = ?");
	mysqli_stmt_bind_param($stmt, 'i', $ref);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_row($res);
	mysqli_free_result($res);
	if ($assoc[0] == 0) {
		$percent = 0;
	} else {
		$stmt2 = mysqli_prepare($db_con, "SELECT IFNULL(SUM(`bet_amount`), 0) FROM `bet` WHERE `ref` = ? AND `bet_type` = ?");
		mysqli_stmt_bind_param($stmt2, 'ii', $ref, $type);
		mysqli_stmt_execute($stmt2);
		$res2 = mysqli_stmt_get_result($stmt2);
		$assoc2 = mysqli_fetch_row($res2);
		mysqli_free_result($res2);
		$percent = $assoc2[0]/$assoc[0];
	}
	return number_format($percent, 2);
}

// Evaluate all the odds for a match
function oddsEvaluation($ref) {
	$ratio1 = percentBet($ref, '1');
	$ratio2 = percentBet($ref, '2'); // draw
	$ratio3 = percentBet($ref, '3');
	
	if ($ratio1 == 0) $ratio1 = '0.01';
	if ($ratio2 == 0) $ratio2 = '0.01';
	if ($ratio3 == 0) $ratio3 = '0.01';
	
	$odd1 = 1 + $GLOBALS['initialOdd']/pow(3*$ratio1, $GLOBALS['limitingFactor']);
	$odd2 = 1 + $GLOBALS['initialOdd']/pow(3*$ratio2, $GLOBALS['limitingFactor']);
	$odd3 = 1 + $GLOBALS['initialOdd']/pow(3*$ratio3, $GLOBALS['limitingFactor']);

	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "UPDATE `match` SET `odds1` = ?, `draw` = ?, `odds2` = ?  WHERE `ref` = ?");
	mysqli_stmt_bind_param($stmt, 'dddi', number_format($odd1, 2), number_format($odd2, 2), number_format($odd3, 2), $ref);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// add a bet
function addBet($ref, $pseudo, $type, $amount) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "INSERT INTO `bet` (ref, pseudo, bet_type, bet_amount) VALUES (?,?,?,?)");
	mysqli_stmt_bind_param($stmt, 'isii', $ref, $pseudo, $type, $amount);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// remove a bet
function supprBet($ref, $pseudo) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "DELETE FROM `bet` WHERE `ref` = ? AND `pseudo` = ? ");
	mysqli_stmt_bind_param($stmt, 'is', $ref, $pseudo);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// remove a match
function supprMatch($ref) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "DELETE FROM `match` WHERE `ref` = ?");
	mysqli_stmt_bind_param($stmt, 'i', $ref);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// remove a bet
function endMatch($ref) {
	oddsEvaluation($ref);
	$match = match($ref);
	$bets = betMatch($ref);
	$resType = $match['res_type'];
	
	switch ($resType) {
		case 1:
			$gainFacto =  $match['odds1'];
			break;
		case 2:
			$gainFacto = $match['draw'];
			break;
		case 3:
			$gainFacto = $match['odds2'];
			break;
	}
	
	foreach ($bets as $bet) {
		if ($bet['bet_type'] == $resType) {
			$gain = $gainFacto * $bet['bet_amount'];
			add_credits($bet['pseudo'], $gain);
		}
		supprBet($ref, $bet['pseudo']);
	}
	supprMatch($ref);
}

// return the location of the images
function img($cat) {
	switch ($cat) {
		case 'football':
			$imgLoc = 'imgs/soccer.png';
			break;
		case 'e-sport':
			$imgLoc = 'imgs/esport.png';
			break;			
		case 'tennis':
			$imgLoc = 'imgs/tennis.png';
			break;			
		case 'basketball':
			$imgLoc = 'imgs/basket.png';
			break;
		case 'rugby':
			$imgLoc = 'imgs/rugby.png';
			break;			
		case 'handball':
			$imgLoc = 'imgs/handball.png';
			break;
		case 'ice-hockey':
			$imgLoc = 'imgs/icehockey.png';
			break;
		case 'volley-ball':
			$imgLoc = 'imgs/volleyball.png';
			break;			
		case 'baseball':
			$imgLoc = 'imgs/baseball.png';
			break;
		case 'fighting-sport':
			$imgLoc = 'imgs/fighting.png';
			break;
	}
	return $imgLoc;
}

?>
