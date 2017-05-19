<?php
	$host = "localhost";
	$user = "root";
	$pass = "higurashi";
	$database = "myface";
	$mysqli = new mysqli($host, $user, $pass, $database);
	
	if($mysqli->error)
	{
		echo "Error Connecting! Message: ".$mysqli->error;
	}
?>

