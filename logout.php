<?php
	session_start();
	session_unset(); 
	session_destroy(); 
	header("refresh: 2; url = login.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logout</title>

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
	<nav>
		<div class="nav-wrapper container">
			<a href="#" class="brand-logo logo2 center">MyFace</a>
		</div>
	</nav>

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col s12 center logout">
					<h2 class="loggedout">Successfully logged out!</h2>
					<br>
					<p>Redirecting to login page...</p>
					<img src="img/loading.gif" alt="loading">
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
</html>