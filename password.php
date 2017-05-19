<?php
	include "connection.php";
	session_start();

	$_SESSION['validPass'] = false;

	if($_SESSION['validPass'] == false){
		if(isset($_POST['password'])){
			$_SESSION['password'] = $_POST['password'];
			$length = strlen($_SESSION['password']);
		}
		if(isset($_SESSION['password'])){
			if($length >= 6){
				$_SESSION['validPass'] = true;
			}
		} 
	}
	
	if($_SESSION['validPass'] == true){
		echo "(Password length requirement met)";
	}
	else if($_SESSION['validPass'] == false && $length != 0){
		echo "(6 character length requirement)";
	}
?>