<?php
	require 'connect.inc.php';
	require 'core.inc.php';

	if(!is_logged_in())
		header('Location: login.php');
?>	
<!DOCTYPE>
<head lang="en">
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
	
	<title>Sell My Books | Publish Ad</title>
	
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
						<li class="active"><a href="#">Publish Your Ad</a></li>
						<li><a href = "myads.php" >My Ads</a></li>
						<li><a href = "logout.php">Logout </a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><? echo $_SESSION['name']; ?></a></li>
					</ul>					
			</div>
		</nav>
	</div>

<?
	$Book_Name_err = $Subject_err = $Author_err = $Edition_err = $Price_err = $Contact_err = $Description_err = '';
	$Book_Name = $Subject = $Author = $Author = $Edition = $Price = $Contact = $Description = '';
	$iserror = False;
	
	if(isset($_POST['Book_Name'])){
		$Book_Name = test_input($_POST['Book_Name']);
		if(empty($Book_Name)){
			$Book_Name_err = '<div class="alert alert-danger"><strong>Book name is required</strong></div>';
			$iserror = True;
		}
		else if(strlen($Book_Name) < 4 ){
			$Book_Name_err = '<div class="alert alert-danger"><strong>Book name must be of altleast 4 letters</strong></div>';
			$iserror  = True;
		}
	}

	if (isset($_POST['Subject'])) {
		$Subject = test_input($_POST['Subject']);
		if($Subject == 'Subject'){
			$Subject_err = '<div class="alert alert-danger"><strong>Please Select Subject</strong></div>';
			$iserror = True;
		}
	}

	if (isset($_POST['Author'])) {
		$Author = test_input($_POST['Author']);
		if(empty($Author)) {
			$Author_err = '<div class="alert alert-danger"><strong>Author Name is required</strong></div>';
			$iserror = True;
		}else if(strlen($Author) <4){
			$Author_err = '<div class="alert alert-danger"><strong>Author name must be of altleast 4 letters</strong></div>';
			$iserror = True;
		}
	}

	if (isset($_POST['Edition'])) {
		$Edition = test_input($_POST['Edition']);
		if (empty($Edition)) {
			$Edition_err = '<div class="alert alert-danger"><strong>Edition is required.</strong></div>';
			$iserror = True;
		}else if(!is_numeric($Edition) or strlen($Edition) != 4){
			$Edition_err = '<div class="alert alert-danger"><strong>Must be 4 digit (ex. 2017)</strong></div>';
			$iserror = True;
		}
	}

	if (isset($_POST['Price'])) {
		$Price = test_input($_POST['Price']);
		if(empty($Price)){
			$Price_err = '<div class="alert alert-danger"><strong>Price is required.</strong></div>';
			$iserror = True;
		}else if (!is_numeric($Price)) {
			$Price_err = '<div class="alert alert-danger"><strong>Must be in digits.</strong></div>';
			$iserror = True;
		}
	}

	if(isset($_POST['Contact'])){
		$Contact = test_input($_POST['Contact']);
		if(empty($Contact)){
			$Contact_err = '<div class="alert alert-danger"><strong>Contact is required.</strong></div>';
			$iserror = True;
		}else{
			if (strlen($Contact)< 10) {
				$Contact_err = '<div class="alert alert-danger"><strong>Must be of 10 digits.</strong></div>';
				$iserror = True;
			}
			if($result  =  mysql_query("select `id` from `users` where '" . mysql_real_escape_string($Contact) . "' = `Contact`")){
				if(mysql_num_rows($result) ==0){
					$Contact_err = '<div class="alert alert-danger"><strong>Contact number must be same as registered mobile number.</strong></div>';
					$iserror = True;
				}
			}
			for ($i=0; $i < 10; $i++) { 
				if(!is_numeric($Contact[$i])){
					$Contact_err = '<div class="alert alert-danger"><strong>Must be in digits.</strong></div>';
					$iserror = True;
					break;
				}
			}
		}
	}

	if (isset($_POST['Description'])) {
		$Description = test_input($_POST['Description']);
		if (empty($Description)) {
			$Description_err = '<div class="alert alert-danger"><strong>Description can\'t be empty.</strong></div>';
			$iserror = True;
		}
	}

	if(!$iserror and !empty($Book_Name) and !empty($Contact) and !empty($Edition)){
		$query = "INSERT INTO `advertisement` VALUES('','". $_SESSION['user_id'] ."','". mysql_real_escape_string($Book_Name) ."','". mysql_real_escape_string($Subject) ."','". mysql_real_escape_string($Author) ."','". mysql_real_escape_string($Edition) ."','". mysql_real_escape_string($Price) ."','". mysql_real_escape_string($Description) ."')";
		if ($result = mysql_query($query)) {
			echo '<div class = "alert alert-success" style = "text-align: center;"><strong>Your ad successfully published.</strong></div>';
				$Book_Name = $Subject = $Author = $Author = $Edition = $Price = $Contact = $Description = '';
		}else{
			die($conn_error);
		}
	}

?>
	
	
	<form action="publish.php" method ="POST">
		<div class="container">
		<div class="alert alert-danger" style="text-align : center;"><p><strong><span style="color: red; font-weight: bolder; font-size: 20px;">*</span> Required Fields.</strong></p></div>
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6">
						<div class="form-group">
							<label for="Book_Name"><h3>Book Name: <span style="color: red;">*</span></h3></label>
							<?echo $Book_Name_err;?>
							<input type="text" name="Book_Name" class="input-lg form-control" maxlength="40" value="<?echo $Book_Name?>" id="Book_Name">
						</div>	
						<div class="form-group">
							<label for="Subject"><h3>Subject:<span style="color: red;">*</span></h3></label>
							<?echo $Subject_err;?>
								<select  name="Subject" class="input-lg form-control" id="Subject">
								<option  >Subject</option>
								<option value = "Advanced Computer Architecture">Advanced Computer Architecture</option><option value = "Advanced Computer Networks">Advanced Computer Networks</option><option value = "Advanced Control Systems">Advanced Control Systems</option><option value = "Advanced Methods of Mfg.">Advanced Methods of Mfg.</option><option value = "Advanced VLSI Design">Advanced VLSI Design</option><option value = "Algorithm Analysis & Design">Algorithm Analysis & Design</option><option value = "Analog Electronics">Analog Electronics</option><option value = "Application of Power Electronics to Power Systems">Application of Power Electronics to Power Systems</option><option value = "Applied Chemistry">Applied Chemistry</option><option value = "Applied Mathematics">Applied Mathematics</option><option value = "Applied Physics">Applied Physics</option><option value = "Applied Physics">Applied Physics</option><option value = "Artificaial Intelligence">Artificaial Intelligence</option><option value = "Artificial Intelligence">Artificial Intelligence</option><option value = "Automotive Engineering,
">Automotive Engineering,
</option><option value = "Bio Medical Electronics">Bio Medical Electronics</option><option value = "Biomedical Instrumentation">Biomedical Instrumentation</option><option value = "Circuits & Systems">Circuits & Systems</option><option value = "Communication Skills">Communication Skills</option><option value = "Communication System & Circuits">Communication System & Circuits</option><option value = "Communication Systems">Communication Systems</option><option value = "Compiler Construction">Compiler Construction</option><option value = "Computer Aided Design">Computer Aided Design</option><option value = "Computer Aided Manufacturing">Computer Aided Manufacturing</option><option value = "Computer Architecture">Computer Architecture</option><option value = "Computer Graphics & Multimedia">Computer Graphics & Multimedia</option><option value = "Computer Networks">Computer Networks</option><option value = "Consumer Electronics">Consumer Electronics</option><option value = "Control Engineering">Control Engineering</option><option value = "Data Structures">Data Structures</option><option value = "Data Warehousing & Data Mining">Data Warehousing & Data Mining</option><option value = "Database Management Systems">Database Management Systems</option><option value = "Digital Circuits & System">Digital Circuits & System</option><option value = "Digital Communication">Digital Communication</option><option value = "Digital Electronics">Digital Electronics</option><option value = "Digital Image Processing">Digital Image Processing</option><option value = "Digital Signal Processing">Digital Signal Processing</option><option value = "E-Commerce & ERP">E-Commerce & ERP</option><option value = "Electrical Drives">Electrical Drives</option><option value = "Electrical Energy Conservation">Electrical Energy Conservation</option><option value = "Electrical Engineering Materials">Electrical Engineering Materials</option><option value = "Electrical Machines">Electrical Machines</option><option value = "Electrical Measurement & Instrumentation">Electrical Measurement & Instrumentation</option><option value = "Electrical Science">Electrical Science</option><option value = "Electro Mechanical Energy Conversion">Electro Mechanical Energy Conversion</option><option value = "Electromagnetic Field Theory">Electromagnetic Field Theory</option><option value = "Electromagnetic Fields & Transmission Lines">Electromagnetic Fields & Transmission Lines</option><option value = "Electronics">Electronics</option><option value = "Embedded System">Embedded System</option><option value = "Engineering Mechanics">Engineering Mechanics</option><option value = "Financial Management">Financial Management</option><option value = "Finite Element Methods">Finite Element Methods</option><option value = "Fluid Systems">Fluid Systems</option><option value = "Foundations of Computer Systems">Foundations of Computer Systems</option><option value = "Gear Technology">Gear Technology</option><option value = "HVDC Transmission">HVDC Transmission</option><option value = "Heat Transfer">Heat Transfer</option><option value = "High Voltage Engineering">High Voltage Engineering</option><option value = "I.C. Engines, Emissions & Pollution Control">I.C. Engines, Emissions & Pollution Control</option><option value = "Impact of Science & Technology on Society">Impact of Science & Technology on Society</option><option value = "Instrumentation">Instrumentation</option><option value = "Integrated Circuit Technology">Integrated Circuit Technology</option><option value = "Introduction to Computers and Auto CAD">Introduction to Computers and Auto CAD</option><option value = "Introduction to NanoTechnology">Introduction to NanoTechnology</option><option value = "Introduction to Programming">Introduction to Programming</option><option value = "Java Programming and Website Design">Java Programming and Website Design</option><option value = "Kinematics & Dynamics of Machines">Kinematics & Dynamics of Machines</option><option value = "LAN & Networking">LAN & Networking</option><option value = "Machine Design">Machine Design</option><option value = "Management of Manufacturing System">Management of Manufacturing System</option><option value = "Manufacturing Information Systems">Manufacturing Information Systems</option><option value = "Manufacturing Machines">Manufacturing Machines</option><option value = "Manufacturing Process">Manufacturing Process</option><option value = "Material Science & Metallurgy">Material Science & Metallurgy</option><option value = "Measurements & Controls">Measurements & Controls</option><option value = "Mechanical Vibrations">Mechanical Vibrations</option><option value = "Mechanics of Fluids">Mechanics of Fluids</option><option value = "Mechanics of Solids">Mechanics of Solids</option><option value = "Mechatronics">Mechatronics</option><option value = "Metal Cutting & Tool Design">Metal Cutting & Tool Design</option><option value = "Metal Forming">Metal Forming</option><option value = "Metrology">Metrology</option><option value = "Microprocessor">Microprocessor</option><option value = "Microprocessor Systems">Microprocessor Systems</option><option value = "Microprocessors & Applications">Microprocessors & Applications</option><option value = "Microwave Engineering">Microwave Engineering</option><option value = "Mobile Communication">Mobile Communication</option><option value = "Mobile Computing">Mobile Computing</option><option value = "Modelling and Simulation of Electrical Machine">Modelling and Simulation of Electrical Machine</option><option value = "Multimedia Applications">Multimedia Applications</option><option value = "Network Security">Network Security</option><option value = "Network Technology">Network Technology</option><option value = "Non-conventional Energy System">Non-conventional Energy System</option><option value = "Numerical Analysis & Programming">Numerical Analysis & Programming</option><option value = "Object Oriented Programming using C++">Object Oriented Programming using C++</option><option value = "Object Oriented Software Engineering">Object Oriented Software Engineering</option><option value = "Operating Systems">Operating Systems</option><option value = "Operation Research">Operation Research</option><option value = "Optical Communication">Optical Communication</option><option value = "Optimization Techniques">Optimization Techniques</option><option value = "Organizational Behavior">Organizational Behavior</option><option value = "Personnel Management">Personnel Management</option><option value = "Power Electronics">Power Electronics</option><option value = "Power Plant Instrumentation">Power Plant Instrumentation</option><option value = "Power Plant Practice ">Power Plant Practice </option><option value = "Power Quality Management">Power Quality Management</option><option value = "Power Station Practice">Power Station Practice</option><option value = "Power System">Power System</option><option value = "Production Technology">Production Technology</option><option value = "Project">Project</option><option value = "Quality Control & Quality Assurance">Quality Control & Quality Assurance</option><option value = "Refrigeration & Air-Conditioning">Refrigeration & Air-Conditioning</option><option value = "Reliability & Maintenance Management">Reliability & Maintenance Management</option><option value = "Reliability Engineering & Application to Power System">Reliability Engineering & Application to Power System</option><option value = "Requirements & Estimation Techniques">Requirements & Estimation Techniques</option><option value = " Robotics"> Robotics</option><option value = "Signal & Systems">Signal & Systems</option><option value = "Soft Computing">Soft Computing</option><option value = "Software Engineering">Software Engineering</option><option value = "Software Testing">Software Testing</option><option value = "Solar Energy">Solar Energy</option><option value = "Special Purpose Machines">Special Purpose Machines</option><option value = "Telecommunication Networks">Telecommunication Networks</option><option value = "Telemetry & Data Acquisition System">Telemetry & Data Acquisition System</option><option value = "Thermal Science">Thermal Science</option><option value = "Utilization of Electrical Energy">Utilization of Electrical Energy</option><option value = "VLSI Design & its Applications">VLSI Design & its Applications</option>							</select>
						</div>
						<div class="form-group">
							<label for="Author"><h3>Author: <span style="color: red;">*</span></h3></label>
							<?echo $Author_err;?>							
							<input type="text" name="Author" class="input-lg form-control" id="Author" maxlength="40" value="<?echo $Author;?>">
						</div>
						<div class="form-group">
							<label for="Edition"><h3>Edition: <span style="color: red;">*</span></h3></label>
							<?echo $Edition_err;?>
							<input type="text" name="Edition" id="Edition" class="form-control input-lg" maxlength="4" value="<?echo $Edition;?>">
						</div>	
						<div class="form-group">
							<label for="Price"><h3>Price: (Rs.)<span style="color: red;">*</span></h3></label>
							<?echo $Price_err;?>
							<input type="text" name="Price" id ="Price" class="form-control input-lg" maxlength="5" value="<?echo $Price;?>">
						</div>
						<div class="form-group">
							<label for="Contact"><h3>Contact:<span style="color: red;">*</span></h3></label>
							<?echo $Contact_err;?>				
							<input type="text" name="Contact" id ="Contact" class="form-control input-lg" maxlength="10" value="<?echo $Contact;?>">
						</div>
						<div class="form-group">
							<label for="Description"><h3>Description:</h3></label>
							<?echo $Description_err;?>
							<textarea name = "Description" id="Description" class="input-lg form-control" rows="10" cols="50" maxlength="500"><?echo $Description;?></textarea>
						</div>
						<div >
							<input type="submit" class="btn btn-lg btn-primary btn-block" value="Publish"><br><br>
						</div>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
	</form>
</body>
</html>