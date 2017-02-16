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
<body  class="container text-left" >
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
						<li class="active"><a href="register.php">Register Now</a></li><li><a href="loginform.inc.php">Login</a></li></ul>					
			</div>
		</nav>
	</div>
	
	<div class="container">
			<div class="alert alert-danger" style="text-align : center;"><p><strong><span style="color: red; font-weight: bolder; font-size: 20px;">*</span> Required Fields.</strong></p></div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<form action="register.php" method="POST">
						<div class="form-group">
							<label for="Name"><h3>Name:<span style="color: red;">*</span></h3></label>
														<input type="text" id = "Name" class="form-control input-lg" name="name" value="">
						</div>
						<div class="form-group">
							<label for="Mobile"><h3>Mobile:<span style="color: red;">*</span></h3></label>
														<input type="text" name="contact" id="Mobile" class="form-control input-lg" value="" maxlength="10">
						</div>
						<div class="form-group">
							<label for="Email"><h3>Email:<span style="color: red;">*</span></h3></label>
														<input type="email" id="Email" class="form-control input-lg" name="username" value="" maxlength="40">
						</div>
						<div class="form-group">
							<label for="Password"><h3>Password:<span style="color: red;">*</span></h3></label>
														<input type="password" id="Password" class="form-control input-lg" name="password" maxlength="16">
						</div>
						<div class="form-group">
							<label for="cpassword"><h3>Confirm Password:</h3></label>
							<input type="password" id="cpassword" class="form-control input-lg" name="cpassword" value="">
						</div>
						<div>
							<input type="submit" class="btn btn-primary btn-lg btn-block" value="Register">
						</div>
					</form>
				</div>
				<div class="col-sm-3"></div>
			</div>
	</div>
</body>
<footer>
	By Saurabh Mishra...
</footer>
</html>