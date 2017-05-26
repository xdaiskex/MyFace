<?php
	include "connection.php";
	session_start();

	if(isset($_SESSION['username']) && isset($_SESSION['fullName']) && isset($_SESSION['postPic']) && isset($_POST['status'])){
		$username = $_SESSION['username'];
		$status = $_POST['status'];
		$name = $_SESSION['fullName'];
		$select1 = "SELECT picture FROM users WHERE username = '$username'";

		$result1 = $mysqli->query($select1);

		while($row = $result1->fetch_array(MYSQLI_ASSOC)){
			$_SESSION['pic'] = $row['picture'];
			$image = $_SESSION['pic'];
		}
		

		if (strlen($status) > 0 && strlen(trim($status)) > 0){
			$insert = "INSERT INTO posts (content, image, fullName, username) 
			VALUES ('".addslashes($status)."', '".addslashes($image)."', '".addslashes($name)."', '".addslashes($username)."')";
			$mysqli->query($insert);

			$select = "SELECT * FROM posts ORDER BY postDate DESC";
			$result = $mysqli->query($select);

			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				echo 
				"<div class='post'>
					<div class='date col l12'><a href='#'>".$row['fullName']."</a> posted on <b>".DATE_FORMAT(new DateTime($row['postDate']), 'M d \a\t g:ia')."</b>
					</div>
					<div class='postPic'><img src='images/".$row['image']."' alt='post' onError=\"this.onerror=null;this.src='img/profile.png';\">
					</div>
					<div class='postContent'><p>".$row['content']."</p></div>
				</div>";
			}
		}
		else{
			echo "error";
		}
	}
	else{
		echo "error";
	}
?>