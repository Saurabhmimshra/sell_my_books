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

<?php
	if(is_logged_in()){
		header('Location: index.php');
	}

	$name_error = $contact_error = $email_error = $password_error = '';
	$name = $contact = $email = $password = $cpassword = $status = '';
	$is_error = False;
	
	if(isset($_POST['name'])){
		$name = test_input($_POST['name']);
		if (empty($name)) {
			$name_error = '<div class="alert alert-danger"><strong>Name is required.</strong></div>';
			$is_error = True;
		}
		if(strlen($name) <= 4){
			$name_error = '<div class="alert alert-danger"><strong>Name must be of altleast 4 letters.</strong></div>';
			$is_error = True;
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    	  $name_error = '<div class="alert alert-danger"><strong>Only letters and white space allowed</strong></div>'; 
    	  $is_error = True;
    	}
	}

	if(isset($_POST['contact'])){
		$contact = test_input($_POST['contact']);
		echo $contact;
		if(empty($contact)){
			$contact_error = '<div class="alert alert-danger"><strong>Contact is required.</strong></div>';
			$is_error = True;
		}else{
			if (strlen($contact)< 10) {
				$contact_error = '<div class="alert alert-danger"><strong>Must be of 10 digits.</strong></div>';
				$is_error = True;
			}
			if($result  =  mysql_query("select `id` from `users` where '" . mysql_real_escape_string($contact) . "' = `contact`")){
				if(mysql_num_rows($result) >=1){
					$contact_error = '<div class="alert alert-danger"><strong>Mobile no. already registered.</strong></div>';
					$is_error = True;
				}
			}
			for ($i=0; $i < 10; $i++) { 
				if(!is_numeric($contact[$i])){
					$contact_error = '<div class="alert alert-danger"><strong>Must be in digits.</strong></div>';
					$is_error = True;
					break;
				}
			}
		}
	}

	if (isset($_POST['email'])) {
		$email = test_input($_POST['email']);
		if (empty($email)) {
			$email_error = '<div class="alert alert-danger"><strong>Email is required.</strong></div>';
			$is_error = True ;
		}
		else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$
	    	  	$email_error = '<div class="alert alert-danger"><strong>Invalid email format.</strong></div>';
	    	  	$is_error =True;
	    	}
	    	else{
		    	if($result = mysql_query("select `id` from `users` where '". mysql_real_escape_string($email) ."' = `email`")){
		    		if(mysql_num_rows($result) >= 1){
		    			$email_error = '<div class="alert alert-danger"><strong>Email is already registered.</strong></div>';
		    			$is_error = True;
		    		}
		    	}
		    }
    	}
	}

	if(isset($_POST['password']) && isset($_POST['cpassword'])){
		$password = test_input($_POST['password']);
		$cpassword = test_input($_POST['cpassword']);
		if(empty($password)){
			$password_error = '<div class="alert alert-danger"><strong>Password is required.</strong></div>';
			$is_error = True;
		}
		else if ($password != $cpassword) {
			$password_error = '<div class="alert alert-danger"><strong>Password must be same.</strong></div>';
			$is_error = True;
		}
		else if(strlen($password)<8){
			$password_error = '<div class="alert alert-danger"><strong>Password must be of 8 - 32 characters.</strong></div>';
		}
	}
	
	if (!$is_error && !empty($email)) {
		if(mysql_query("insert into `users` values('','". mysql_real_escape_string($email) ."','". mysql_real_escape_string($name) ."','". mysql_real_escape_string($contact) ."','". mysql_real_escape_string($password) ."')")){
			$status =	 '	<div class="alert alert-success" style="text-align : center;"><strong>Registration Successfull. <a href = "login.php"><i>click here to login</i></a></strong></div>';
		}else
			$status = mysql_error();
	}

?>

<body  class="container text-left" >
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
						<li ><a href="index.php">Home</a></li>
						<li><a href="publish.php">Publish Your Ad</a></li>
						<li class="active"><a href="register.php">Register Now</a></li>
						<li><a href="login.php">Login</a></li>
					</ul>					
			</div>
		</nav>
	</div>
	
	<div class="container">
			<div class="alert alert-danger" style="text-align : center;"><p><strong><span style="color: red; font-weight: bolder; font-size: 20px;">*</span> Required Fields.</strong></p></div>
			<?if(!$is_error)echo $status;?>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<form action="register.php" method="POST">
						<div class="form-group">
							<label for="Name"><h3>Name:<span style="color: red;">*</span></h3></label>
							<?php echo $name_error;?>
														<input type="text" id = "Name" class="form-control input-lg" name="name" value="<?echo $name;?>">
						</div>
						<div class="form-group">
							<label for="Mobile"><h3>Mobile:<span style="color: red;">*</span></h3></label>
							<?php echo $contact_error;?>	
							<input type="text" name="contact" id="Mobile" class="form-control input-lg" value="<?echo $contact; ?>" maxlength="10">
						</div>
						<div class="form-group">
							<label for="Email"><h3>Email:<span style="color: red;">*</span></h3></label>
													<?php echo $email_error;?>
														<input type="email" id="Email" class="form-control input-lg" name="email" value="<?echo $email;?>" maxlength="40">
						</div>
						<div class="form-group">
							<label for="Password"><h3>Password:<span style="color: red;">*</span></h3></label>
														<?php echo $password_error;?>	
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