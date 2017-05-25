<?php
	include "connection.php";
	session_start();

	if(isset($_SESSION['username']) && isset($_SESSION['postPic']) && isset($_POST['status'])){
		$username = $_SESSION['username'];
		$status = $_POST['status'];

		if (strlen($status) > 0 && strlen(trim($status)) > 0){
			$insert = "INSERT INTO status (content, username) 
			VALUES ('".addslashes($status)."', '".addslashes($username)."')";
			$mysqli->query($insert);

			$select = "SELECT * FROM status WHERE username = '$username' ORDER BY postDate DESC";
			$result = $mysqli->query($select);

			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				echo 
				"<div class='post'>
					".$_SESSION['postPic']."
					<div class='postContent'><p>".$row['content']."</p></div>
					<div class='date'><b>".DATE_FORMAT(new DateTime($row['postDate']), 'M d \a\t g:ia')."</b></div>
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