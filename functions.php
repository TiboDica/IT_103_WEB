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
  	die('Could not connect: ' . mysql_error());
		}
		echo 'Connected successfully<br />';
	return $con;
}


// Execute a database operation.
function db_query($con, $query){
	$db_query = mysqli_query($con, $query);
if(! $db_query )
{
  die('Could not complete db operation : ' . mysql_error());
}
echo "Db operation completed successfully<br />";
	return $db_query;
}

?>
