<?php
	include "connection.php";
	session_start();

	$_SESSION['login'] = false;

	if(isset($_POST['userLog']) && isset($_POST['passLog'])){
		$_SESSION['userLog'] = $_POST['userLog'];
		$_SESSION['passLog'] = $_POST['passLog'];
		$user = $_SESSION['userLog'];
		$pass = $_SESSION['passLog'];
	}

	$select = "SELECT id, username, password, first, last, picture, music FROM users";
	$result = $mysqli->query($select);

	if($_SESSION['login'] == false){
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			if($user == $row['username'] && $pass == $row['password']){
				echo "success";
				$_SESSION['login'] = true;
				$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['first'] = $row['first'];
				$_SESSION['last'] = $row['last'];
				$_SESSION['fullName'] = $row['first']." ".$row['last'];
				$_SESSION['userId'] = $row['id'];
				$_SESSION['profile'] = $row['picture'];
			}
		}
	}
?>