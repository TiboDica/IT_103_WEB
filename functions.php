<?php
include("config.php");

// Return name of website (as set in config.php).
function siteTitle() {
	return $GLOBALS['siteTitle'];
}

// Open a connexion to the database.
function db_con()	{
	$con = mysqli_connect($GLOBAL['dbServ'], $GLOBALS['dbUser'], $GLOBALS['dbPass'], $GLOBALS['dbName']);
	if(! $con ){
		echo 'Could not complete db operation : ';
		echo mysql_error();
		}
		echo 'Connected successfully<br />';
	return $con;
}


// Execute a database operation.
function db_query($con, $query){
	$db_query = mysqli_query($con, $query);
if(! $db_query ){
  echo 'Could not complete db operation : ';
	echo mysql_error();
}
echo "Db operation completed successfully<br />";
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
	$stmt1 = mysqli_prepare($db_con, "SELECT (email, pwd_hash) FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt1, 's', $email);
	if (mysqli_stmt_execute($stmt1)){
		mysqli_stmt_bind_result($stmt1, $email, $hash);
		if (password_verify($pwd, $hash)){
			mysqli_close($db_con);
			return true;
		}
		else {
			mysqli_close($db_con);
			return false;
		}
	}
	else {
		mysqli_close($db_con);
		return false;
	}
}

?>
