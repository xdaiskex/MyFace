<?php
	include "connection.php";
	session_start();

	if(isset($_SESSION['fullName'])){
		$fullname = $_SESSION['fullName'];
		$first = $_SESSION['first'];
		$username = $_SESSION['username'];

		$select = "SELECT picture FROM users WHERE username = '$username'";
		$result = $mysqli->query($select);
		//$_SESSION['mobilePic'] = "images/".$_SESSION['profile']."";
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$_SESSION['mobilePic'] = "<div class='fill2'><img src='images/".$row['picture']."' alt='profile' class=' ' onError=\"this.onerror=null;this.src='img/profile.png';\"></div>";
			$_SESSION['postPic'] = "<div class='postPic'><img src='images/".$row['picture']."' alt='post' onError=\"this.onerror=null;this.src='img/profile.png';\"></div>";
		}
		
	}
	else{
		header("Location: login.html");
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
							<a href="#">Home</a>
						</li>
						<li>
							<a href="profile.php">Profile</a>
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
				        	<?php echo $_SESSION['coverPic']; ?>
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
				      	<?php
				      		$username = $_SESSION['username'];
				      		$select = "SELECT * FROM users WHERE NOT username = '$username'";
							$result = $mysqli->query($select);

							while($row = $result->fetch_array(MYSQLI_ASSOC)){
								echo 
								"<li>
									<div>
				      					<img src='images/".$row['picture']."' alt='".$row['username']."' onError=\"this.onerror=null;this.src='img/profile.png';\">
				      				</div>
				      				<span class='friendsName'>".$row['first']." ".$row['last']."</span>
				      			</li>";
							}
				      	?>
			      		<!-- <li>
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
			      		</li> -->
			      	</ul>
			    </div>
				<div class="col s9 content">	
					<div class="statusArea">
						<?php echo $_SESSION['postPic'] ?>
						<form method="post" action="" class="col s10 offset-s1" id="statusForm">
							<textarea name="status" class="status" placeholder="What do you want to brag to your friends about today?"></textarea>
							<input type="submit" name="submit" value="Post" class="btn col s2 offset-s10">
						</form>
					</div>
					<div class="col s10 offset-s1 feed center">
					<?php
						if(isset($_SESSION['postPic'])){
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
									<div class='comments'> 
									</div>
									<form method='post' action='' id='commentForm'>
										<textarea name='comment' class='comment' placeholder='Write a comment...'></textarea>
										<input type='submit' name='submitComment' value='Post' class='btn col black s2 offset-s10'>
									</form>
								</div>";
							}
						}
					?>
					</div>
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