	
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
	
	<title>Sale My Books | My Ads</title>
	
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
						<li><a href="index.php">Home</a></li>
						<li><a href="publish_add.php">Publish Your Ad</a></li>
						<li class="active" ><a href = "#" >My Ads</a></li><li><a href = "logout.php">Logout </a></li></ul><ul class="nav navbar-nav navbar-right"><li><a href="#">Hi mai hun na !</a></li></ul>					
			</div>
		</nav>
	</div>

	<div class="container">
		<div class="alert alert-success" style="text-align : center;"><p><strong>Your Books</strong></p></div><div class="container"><div class="row">
													<div class="col-sm-1"></div>
													<div class="col-sm-10">
														<div class="panel panel-info">
															<div class="panel-heading">
																	<h5 class="panel-title">
																		<div class="row">
																			<div class="col-sm-8">
																				c programming
																			</div>
																			<div class="col-sm-2">
																				<span id="price_tag"> Rs. 180</span>
																			</div>
																			<div class = "col-sm-2">
																				<form action = "my_ads.php" method = "POST">
																					<input type="text" name="deleteItem" value="3" hidden/>
																					<input type = "Submit" name = "deleteinput" value = "Remove" class = "btn btn-danger btn-md"/>
																				</form>
																			</div>
																		</div>
																	</h5>
															</div>
															<div class="panel-body">
																<div class="container">
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Subject</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>Introduction to Programming</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Author</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>Denis</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Edition</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>2000</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Contact</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>5555555555</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Description</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>bla bla</p>
																		</div>
																	</div>
																</div>
															</div>
												  		</div>
													</div>
													<div class="col-sm-1"></div>
												  </div></div>	</div>

</body>
</html>
