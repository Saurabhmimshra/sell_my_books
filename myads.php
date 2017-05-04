<?php
	require 'connect.inc.php';
	require 'core.inc.php';

	if(!is_logged_in())
		header('Location: login.php');
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
			<div class="col-xs-6"><h1>Sell My Books</h1></div>
		</div>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Sell My Books</a>
				</div>
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="publish.php">Publish Your Ad</a></li>
						<li class="active" ><a href = "#" >My Ads</a></li>
						<li><a href = "logout.php">Logout </a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><? echo $_SESSION['name']; ?></a></li>
					</ul>					
			</div>
		</nav>
	</div>

	
		
<?
		$msg = 'Your Books';

			if(isset($_POST['deleteItem'])){
				$item = $_POST['deleteItem'];
				if(!empty($item)){
					$query = "DELETE FROM `advertisement` WHERE `ad_id` = '". $item ."'";
					if(mysql_query($query)){
						$msg ='Ad removed successfully.';
					}
				}
			}



			$query = "SELECT `contact`, `bname`, `sub`, `ad_id`, `price`, `author`, `edition`, `descrip` FROM `users` INNER JOIN `advertisement` ON `users`.`id` = `advertisement`.`id` WHERE `users`.`id` = '".$_SESSION['user_id']."'";
			if ($result  = mysql_query($query)) {
				if(mysql_num_rows($result)==0){
					echo '<div class = "alert alert-danger" style = "text-align : center;"><strong>You don\'t have any ad published.</strong></div>';
				}else{
					echo '<div class="container">
						<div class="alert alert-success" style="text-align : center;">
							<p><strong>'. $msg .'</strong></p>
						</div>
						<div class="container">';
					while($row = mysql_fetch_assoc($result)){
						echo '<div class="row">
												<div class="col-sm-1"></div>
												<div class="col-sm-10">
														<div class="panel panel-info">
															<div class="panel-heading">
																	<h5 class="panel-title">
																		<div class="row">
																			<div class="col-sm-8">
																				'. $row['bname'] .'
																			</div>
																			<div class="col-sm-2">
																				<span id="price_tag"> Rs. '. $row['price'] .'</span>
																			</div>
																			<div class = "col-sm-2">
																				<form action = "myads.php" method = "POST">
																					<input type="text" name="deleteItem" value="'. $row['ad_id'] .'" hidden/>
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
																			<p>'. $row['sub'] .'</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Author</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>'. $row['author'] .'</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Edition</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>'. $row['edition'] .'</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Contact</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>'. $row['contact'] .'</p>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-sm-4">
																			<p><strong><span id="detail_heading">Description</span></strong></p>
																		</div>
																		<div class="col-sm-8">
																			<p>'. wordwrap($row['descrip'],80,'<br>') .'</p>
																		</div>
																	</div>
																</div>
															</div>
												  		</div>
													</div>
													<div class="col-sm-1"></div>
												</div>';
					}
				}
			}else{
				die($conn_errror);
			}
?>
													
						</div>
				</div>

</body>
</html>
