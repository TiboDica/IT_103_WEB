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

// return remaining credits of user
function remaining_credits($email){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `credits` FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	mysqli_close($db_con);
	return $assoc['credits'];
}

// add credits to a user
function add_credits($email, $credits) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `credits` FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	$stmt = mysqli_prepare($db_con, "UPDATE `user` SET `credits` = ? WHERE `email` = ?");
	$credits = $credits + $assoc['credits'];
	mysqli_stmt_bind_param($stmt, 'is', $credits, $email);
	mysqli_stmt_execute($stmt);
	mysqli_close($db_con);
}

// return list of all current matchs
function list_bets(){
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT * FROM `match`");
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
	$stmt = mysqli_prepare($db_con, "SELECT * FROM `match` WHERE `cat` = ?");
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
function betsUser($email) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT `pseudo` FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_assoc($res);
	mysqli_free_result($res);
	$pseudo = $assoc['pseudo'];
	
	$stmt2 = mysqli_prepare($db_con, "SELECT * FROM `bet` INNER JOIN `match` ON `bet`.ref = `match`.ref WHERE `bet`.`pseudo` = ?");
	mysqli_stmt_bind_param($stmt2, 's', $pseudo);
	mysqli_stmt_execute($stmt2);
	$res2 = mysqli_stmt_get_result($stmt2);
	$assoc2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);
	mysqli_free_result($res2);
	mysqli_close($db_con);
	return $assoc2;
}

// return the percentage of people that betted on a specific choice
function percentBet($ref, $type) {
	$db_con = db_con();
	$stmt = mysqli_prepare($db_con, "SELECT SUM(`bet_amount`) FROM `bet` WHERE `ref` = ?");
	mysqli_stmt_bind_param($stmt, 'i', $ref);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$assoc = mysqli_fetch_row($res);
	mysqli_free_result($res);
	
	$stmt2 = mysqli_prepare($db_con, "SELECT SUM(`bet_amount`) FROM `bet` WHERE `ref` = ? AND `bet_type` = ?");
	mysqli_stmt_bind_param($stmt2, 'ii', $ref, $type);
	mysqli_stmt_execute($stmt2);
	$res2 = mysqli_stmt_get_result($stmt2);
	$assoc2 = mysqli_fetch_row($res2);
	mysqli_free_result($res2);
	$percent = $assoc2[0]/$assoc[0];
	return $percent;
}

?>
