<?php
	include "connection.php";
	session_start();

	$_SESSION['signup'] = false;

	if($_SESSION['signup'] == false){
		if(!is_null($_SESSION['taken']) && !is_null($_SESSION['validPass'])){
			if($_SESSION['taken'] == false && $_SESSION['validPass'] == true){
				if(isset($_POST['username'])){
					$_SESSION['username'] = $_POST['username'];
					$username = $_SESSION['username'];
				}
				if(isset($_POST['password'])){
					$_SESSION['password'] = $_POST['password'];
					$password = $_SESSION['password'];
				}
				if(isset($_POST['first'])){
					$_SESSION['first'] = $_POST['first'];
					$first = $_SESSION['first'];
				}
				if(isset($_POST['last'])){
					$_SESSION['last'] = $_POST['last'];
					$last = $_SESSION['last'];
				}

				if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first']) && isset($_POST['last'])){
					$_SESSION['signup'] = true;
				}

				if($_SESSION['signup'] == true){
					$insert = "INSERT INTO users (
							username,
							password,
							first,
							last)
						VALUES (
							'".addslashes($username)."',
							'".addslashes($password)."',
							'".addslashes($first)."',
							'".addslashes($last)."')";
					
					if($mysqli->query($insert) === TRUE){
						echo "success";
					}
					else{
						echo "failure";
					}
				}
			}
		}
	}
?>