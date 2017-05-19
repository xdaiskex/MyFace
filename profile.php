<?php
	include "connection.php";
	session_start();

	if(isset($_SESSION['fullName'])){
		$fullname = $_SESSION['fullName'];
		$first = $_SESSION['first'];
		$username = $_SESSION['username'];
	}
	else{
		header("Location: login.html");
	}

	if(isset($_POST['submittedProfile']) && isset($_SESSION['fullName'])){
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$fileType = pathinfo($target, PATHINFO_EXTENSION);

		if ((($fileType == "png" || $fileType == "PNG")
	    || ($fileType == "jpg" || $fileType == "JPG")
	    || ($fileType == "jpeg" || $fileType == "JPEG")
	    || ($fileType == "gif" || $fileType == "GIF"))
	  	&& ($_FILES['image']['size'] < 10485760)){
			$insert = "UPDATE users SET picture = '$image' WHERE username = '$username'";
			$result = $mysqli->query($insert);

			$select = "SELECT picture FROM users WHERE username = '$username'";
			$result2 = $mysqli->query($select);

			while($row = $result2->fetch_array(MYSQLI_ASSOC)){
				$_SESSION['picture'] = "<img src='images/".$row['picture']."' alt='profile' class='profilePic' onError=\"this.onerror=null;this.src='img/profile.png';\">";
				$_SESSION['mobilePic'] = "<img src='images/".$row['picture']."' alt='profile' class='circle mobilePic' onError=\"this.onerror=null;this.src='img/profile.png';\">";
			}
			
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
		}
		else if ((($fileType == "png" || $fileType == "PNG")
	    || ($fileType == "jpg" || $fileType == "JPG")
	    || ($fileType == "jpeg" || $fileType == "JPEG")
	    || ($fileType == "gif" || $fileType == "GIF"))
	  	&& ($_FILES['image']['size'] > 10485760)){
			echo "File size over 10MB";
		}
		else{
			echo "Not an image";
		}
	}

	if(isset($_POST['submittedMusic']) && isset($_SESSION['fullName'])){
		$target2 = "music/".basename($_FILES['music']['name']);
		$music = $_FILES['music']['name'];
		$fileType = pathinfo($target2, PATHINFO_EXTENSION);

		if(($fileType == "MP3" || $fileType == "mp3") && ($_FILES['music']['size'] < 10485760)){
			$insert2 = "UPDATE users SET music = '$music' WHERE username = '$username'";
			$result2 = $mysqli->query($insert2);

			$select2 = "SELECT music FROM users WHERE username = '$username'";
			$result3 = $mysqli->query($select2);

			while($row = $result3->fetch_array(MYSQLI_ASSOC)){
				$_SESSION['music'] = "<audio autoplay src='music/".$row['music']."' type='audio/mpeg'></audio>";
			}
			
			move_uploaded_file($_FILES['music']['tmp_name'], $target2);
		}
		else if(($fileType == "MP3" || $fileType == "mp3") && ($_FILES['music']['size'] > 10485760)){
			echo "File size over 10MB";
		}
		else{
			echo "Not an mp3 file";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyFace</title>

	<!-- Reset CSS -->
	<link rel="stylesheet" type="text/css" href="css/reset.css">

	<!-- Latest compiled and minified Materialize CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

  	<!-- Icons -->
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  	<!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<header>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper container3">
					<a href="#" class="brand-logo">MyFace</a>
					<a href="#" data-activates="mobile-demo" class="button-collapse">
						<i class="material-icons">menu</i>
					</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="#">Profile</a>
						</li>
						<li>
							<a href="#">Settings</a>
						</li>
						<li>
							<a href="logout.php">Logout</a>
						</li>
					</ul>
				</nav>
			</div>
			<ul class="side-nav" id="mobile-demo">
				<li>
					<div class="userView">
				      	<div class="background">
				        	<img src="img/navBackground.jpg">
				      	</div>
				      	<a href="profile.php"><?php echo $_SESSION['mobilePic']; ?></a>
				      	<a href="profile.php"><span class="white-text name mobileName"><?php echo $fullname; ?></span></a>
		    		</div>
		    	</li>
		        <li class="sideOptions"><a href="index.php"><i class="material-icons">dashboard</i>Home</a></li>
		        <li class="sideOptions"><a href="profile.php"><i class="material-icons">account_circle</i>Profile</a></li>
		        <li class="sideOptions"><a href="settings.php"><i class="material-icons">settings</i>Settings</a></li>
		        <li class="sideOptions"><a href="logout.php"><i class="material-icons">input</i>Logout</a></li>
	      	</ul>
		</div>
	</header>

	<div id="main">
		<div class="container2">
			<div class="row">
				<div class="friends col s3">
			      	<ul class="friendsList">
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyen</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyener</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyening</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyendy</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyensday</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyenter</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyendshield</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyendmill</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyendsurfing</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyendow</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyen</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyen</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Nguyen</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony No</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony Matter</span>
			      		</li>
			      		<li>
			      			<img src="img/profile0.png" alt="friends">
			      			<span class="friendsName">Anthony What</span>
			      		</li>
			      	</ul>
			    </div>
				<div class="col s9 content center">	
					<div class="cover">
						<img src="img/haik.jpg" alt="profile" >
					</div>
					<?php 
						$select = "SELECT picture FROM users WHERE username = '$username'";
						$result2 = $mysqli->query($select);
						$counter = 0;
						while($row = $result2->fetch_array(MYSQLI_ASSOC)){
							$counter++;
							if($row['picture'] != "" || $row['picture'] != 0){
								echo "<div class='fill'><img src='images/".$row['picture']."' alt='profile' class='profile2' onError=\"this.onerror=null;this.src='img/profile.png';\">";
							}
							else{
								echo "<div class='fill'>
								<img src='img/profile.png' class='profile2'></div>";
							}					
						}
						
						echo "<h3 class='fullName'>".$_SESSION['fullName']."</h3>";
					?>
						<form action="" method="post" id="profileForm" enctype="multipart/form-data" class="col s12 l12">
							<div class="file-field input-field changePhoto">
								<div class="btn black profileBtn">
	        						<span>Change Photo</span>
									<input type="file" name="image" id="profilePicture" class="file" accept="image/*">
								</div>
								<div class="file-path-wrapper">
	        						<input class="file-path validate black-text" type="text" name="submittedProfile">
	      						</div>
							</div>
							<input type="submit" name="uploadProfile" value="Upload" class="btn btn-large profileSubmit">
						</form>
					</div>
					<?php 
						echo "<h3 class=''>".$_SESSION['fullName']."</h3>";
						$select = "SELECT music FROM users WHERE username = '$username'";
						$result2 = $mysqli->query($select);
						$counter = 0;
						while($row = $result2->fetch_array(MYSQLI_ASSOC)){
							$counter++;
							if($row['music'] != "" || $row['music'] != 0){
								echo "<audio autoplay src='music/".$row['music']."' type='audio/mpeg'></audio>";
							}
							else{
								echo "No music found.";
							}					
						}						
					?>
					<form action="" method="post" id="musicForm" enctype="multipart/form-data" class="col s12 l4 offset-l4">
						<div class="file-field input-field">
							<div class="btn black">
        						<span>Change Music</span>
								<input type="file" name="music" id="music" class="file" accept="audio/*">
							</div>
							<div class="file-path-wrapper musicLine">
        						<input class="file-path validate black-text" type="text" name="submittedMusic">
      						</div>
						</div>
						<input type="submit" name="uploadMusic" value="upload" class="btn btn-large blue profileSubmit">
					</form>
				</div>
			</div>
		</div>
	</div>

	<!--  jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <!-- Latest compiled and minified Materialize JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

  	<!-- Materialize Init-->
  	<script src="js/init.js"></script>

  	<!--  Ajax -->
    <script src="js/ajax.js"></script>

  	<!-- Custom jQuery -->
  	<script src="js/jquery.js"></script>
</body>
</html>