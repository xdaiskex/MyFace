<?php
	include "connection.php";
	session_start();

	$_SESSION['taken'] = false;

	$select = "SELECT username FROM users";

	$result = $mysqli->query($select);

	if(isset($_POST['username'])){
		$_SESSION['username'] = $_POST['username'];
	}

	if($_SESSION['taken'] == false){
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			if(isset($_POST['username'])){
				$_SESSION['username'] = $_POST['username'];
			}

			if(isset($_SESSION['username'])){
				if($_SESSION['username'] == $row['username']){
					$_SESSION['taken'] = true;
				}
			}
		}
	}

	if($_SESSION['taken'] == true){
		echo "(".$_SESSION['username']." is taken)";
	} 
	else if(!empty($_SESSION['username'])){
		echo "(".$_SESSION['username']." is available)";
	}
	else{
		echo "";
	}
	
?>