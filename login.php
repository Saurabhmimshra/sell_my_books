<?php
	require 'connect.inc.php';
	require 'core.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- general stylesheet -->
	<link rel="stylesheet" type="text/css" href="./general.css">
	<!-- font faimily link (google fonts)-->
	<link href="https://fonts.googleapis.com/css?family=Lobster|Noto+Serif|Ubuntu" rel="stylesheet">
	
	<title>Sale My Books</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Sale and Buy engineering books.We offers free intercollege classified ads of books for students.Sale My Books provides a simple solution to the students to get low priced books.">
	<meta name="author" content="Saurabh Mishra (IT Student,NIEC)">
	<meta name="keywords" content="Books, Sale, Students, Ads, Sale, Purchase">
	<meta name="robots" content="index,follow">
</head>
<body class="container text-left">

	<div>
		<div class="row page-header">
			<div class="col-xs-6"><h1>Sale My Books</h1></div>
		</div>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Sale My Books</a>
				</div>
					<ul class="nav navbar-nav">
						<li ><a href="index.php">Home</a></li>
						<li><a href="publish_add.php">Publish Your Ad</a></li>
						<li><a href="register.php">Register Now</a></li><li class="active"><a href="loginform.inc.php">Login</a></li></ul>					
			</div>
		</nav>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
					<form action="/loginform.inc.php" method="POST">
					<div class="form-group">
						<label for="Email"><h3>Email:</h3></label>
						<input type="email" id ="Email" class="form-control input-lg" name="Username" maxlength="40">
					</div>
					<div class="form-group">
						<lable for="Password"><h3>Password:</h3></lable>
						<input type="Password" name="Password" class="input-lg form-control" id="Password" maxlength="16">
					</div>
					<input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" ><br><br><br>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</body>
</html>