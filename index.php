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
	<script type="text/javascript">
		function post_request(){
			var Request = request_form.Request.value;
			if (Request == "") {
				alert("Please write some text to post.");
				return;
			}
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200){
			     var posted_requests = document.getElementById("posted_requests");
			     posted_requests.innerHTML = xmlhttp.responseText;
			    }
			}
			xmlhttp.open('GET', 'post_request.php?Request='+Request, true);
			xmlhttp.send();
			request_form.Request.value = "";
		}

		

		
	</script>

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
						<li class="active"><a href="#">Home</a></li>
						<li><a href="publish_add.php">Publish Your Ad</a></li>
						<li><a href="register.php">Register Now</a></li><li><a href="loginform.inc.php">Login</a></li></ul>					
			</div>
		</nav>
	</div>
	
	<!--   SEARCH FORM -->

	<div class="container">
		<div class="jumbotron">			
			<div class="text-center">
				<form  name= "search" action = "index.php" method="POST">
					<div class="form-group">
						<label for="sel1"><h2>Select Subject</h2></label>
						<select class="form-control input-lg" id="sel1" name="searched_subject">
							<option >All Subjects</option>
							<option value = "Advanced Computer Architecture">Advanced Computer Architecture</option><option value = "Advanced Computer Networks">Advanced Computer Networks</option><option value = "Advanced Control Systems">Advanced Control Systems</option><option value = "Advanced Methods of Mfg.">Advanced Methods of Mfg.</option><option value = "Advanced VLSI Design">Advanced VLSI Design</option><option value = "Algorithm Analysis & Design">Algorithm Analysis & Design</option><option value = "Analog Electronics">Analog Electronics</option><option value = "Application of Power Electronics to Power Systems">Application of Power Electronics to Power Systems</option><option value = "Applied Chemistry">Applied Chemistry</option><option value = "Applied Mathematics">Applied Mathematics</option><option value = "Applied Physics">Applied Physics</option><option value = "Applied Physics">Applied Physics</option><option value = "Artificaial Intelligence">Artificaial Intelligence</option><option value = "Artificial Intelligence">Artificial Intelligence</option><option value = "Automotive Engineering,
">Automotive Engineering,
</option><option value = "Bio Medical Electronics">Bio Medical Electronics</option><option value = "Biomedical Instrumentation">Biomedical Instrumentation</option><option value = "Circuits & Systems">Circuits & Systems</option><option value = "Communication Skills">Communication Skills</option><option value = "Communication System & Circuits">Communication System & Circuits</option><option value = "Communication Systems">Communication Systems</option><option value = "Compiler Construction">Compiler Construction</option><option value = "Computer Aided Design">Computer Aided Design</option><option value = "Computer Aided Manufacturing">Computer Aided Manufacturing</option><option value = "Computer Architecture">Computer Architecture</option><option value = "Computer Graphics & Multimedia">Computer Graphics & Multimedia</option><option value = "Computer Networks">Computer Networks</option><option value = "Consumer Electronics">Consumer Electronics</option><option value = "Control Engineering">Control Engineering</option><option value = "Data Structures">Data Structures</option><option value = "Data Warehousing & Data Mining">Data Warehousing & Data Mining</option><option value = "Database Management Systems">Database Management Systems</option><option value = "Digital Circuits & System">Digital Circuits & System</option><option value = "Digital Communication">Digital Communication</option><option value = "Digital Electronics">Digital Electronics</option><option value = "Digital Image Processing">Digital Image Processing</option><option value = "Digital Signal Processing">Digital Signal Processing</option><option value = "E-Commerce & ERP">E-Commerce & ERP</option><option value = "Electrical Drives">Electrical Drives</option><option value = "Electrical Energy Conservation">Electrical Energy Conservation</option><option value = "Electrical Engineering Materials">Electrical Engineering Materials</option><option value = "Electrical Machines">Electrical Machines</option><option value = "Electrical Measurement & Instrumentation">Electrical Measurement & Instrumentation</option><option value = "Electrical Science">Electrical Science</option><option value = "Electro Mechanical Energy Conversion">Electro Mechanical Energy Conversion</option><option value = "Electromagnetic Field Theory">Electromagnetic Field Theory</option><option value = "Electromagnetic Fields & Transmission Lines">Electromagnetic Fields & Transmission Lines</option><option value = "Electronics">Electronics</option><option value = "Embedded System">Embedded System</option><option value = "Engineering Mechanics">Engineering Mechanics</option><option value = "Financial Management">Financial Management</option><option value = "Finite Element Methods">Finite Element Methods</option><option value = "Fluid Systems">Fluid Systems</option><option value = "Foundations of Computer Systems">Foundations of Computer Systems</option><option value = "Gear Technology">Gear Technology</option><option value = "HVDC Transmission">HVDC Transmission</option><option value = "Heat Transfer">Heat Transfer</option><option value = "High Voltage Engineering">High Voltage Engineering</option><option value = "I.C. Engines, Emissions & Pollution Control">I.C. Engines, Emissions & Pollution Control</option><option value = "Impact of Science & Technology on Society">Impact of Science & Technology on Society</option><option value = "Instrumentation">Instrumentation</option><option value = "Integrated Circuit Technology">Integrated Circuit Technology</option><option value = "Introduction to Computers and Auto CAD">Introduction to Computers and Auto CAD</option><option value = "Introduction to NanoTechnology">Introduction to NanoTechnology</option><option value = "Introduction to Programming">Introduction to Programming</option><option value = "Java Programming and Website Design">Java Programming and Website Design</option><option value = "Kinematics & Dynamics of Machines">Kinematics & Dynamics of Machines</option><option value = "LAN & Networking">LAN & Networking</option><option value = "Machine Design">Machine Design</option><option value = "Management of Manufacturing System">Management of Manufacturing System</option><option value = "Manufacturing Information Systems">Manufacturing Information Systems</option><option value = "Manufacturing Machines">Manufacturing Machines</option><option value = "Manufacturing Process">Manufacturing Process</option><option value = "Material Science & Metallurgy">Material Science & Metallurgy</option><option value = "Measurements & Controls">Measurements & Controls</option><option value = "Mechanical Vibrations">Mechanical Vibrations</option><option value = "Mechanics of Fluids">Mechanics of Fluids</option><option value = "Mechanics of Solids">Mechanics of Solids</option><option value = "Mechatronics">Mechatronics</option><option value = "Metal Cutting & Tool Design">Metal Cutting & Tool Design</option><option value = "Metal Forming">Metal Forming</option><option value = "Metrology">Metrology</option><option value = "Microprocessor">Microprocessor</option><option value = "Microprocessor Systems">Microprocessor Systems</option><option value = "Microprocessors & Applications">Microprocessors & Applications</option><option value = "Microwave Engineering">Microwave Engineering</option><option value = "Mobile Communication">Mobile Communication</option><option value = "Mobile Computing">Mobile Computing</option><option value = "Modelling and Simulation of Electrical Machine">Modelling and Simulation of Electrical Machine</option><option value = "Multimedia Applications">Multimedia Applications</option><option value = "Network Security">Network Security</option><option value = "Network Technology">Network Technology</option><option value = "Non-conventional Energy System">Non-conventional Energy System</option><option value = "Numerical Analysis & Programming">Numerical Analysis & Programming</option><option value = "Object Oriented Programming using C++">Object Oriented Programming using C++</option><option value = "Object Oriented Software Engineering">Object Oriented Software Engineering</option><option value = "Operating Systems">Operating Systems</option><option value = "Operation Research">Operation Research</option><option value = "Optical Communication">Optical Communication</option><option value = "Optimization Techniques">Optimization Techniques</option><option value = "Organizational Behavior">Organizational Behavior</option><option value = "Personnel Management">Personnel Management</option><option value = "Power Electronics">Power Electronics</option><option value = "Power Plant Instrumentation">Power Plant Instrumentation</option><option value = "Power Plant Practice ">Power Plant Practice </option><option value = "Power Quality Management">Power Quality Management</option><option value = "Power Station Practice">Power Station Practice</option><option value = "Power System">Power System</option><option value = "Production Technology">Production Technology</option><option value = "Project">Project</option><option value = "Quality Control & Quality Assurance">Quality Control & Quality Assurance</option><option value = "Refrigeration & Air-Conditioning">Refrigeration & Air-Conditioning</option><option value = "Reliability & Maintenance Management">Reliability & Maintenance Management</option><option value = "Reliability Engineering & Application to Power System">Reliability Engineering & Application to Power System</option><option value = "Requirements & Estimation Techniques">Requirements & Estimation Techniques</option><option value = " Robotics"> Robotics</option><option value = "Signal & Systems">Signal & Systems</option><option value = "Soft Computing">Soft Computing</option><option value = "Software Engineering">Software Engineering</option><option value = "Software Testing">Software Testing</option><option value = "Solar Energy">Solar Energy</option><option value = "Special Purpose Machines">Special Purpose Machines</option><option value = "Telecommunication Networks">Telecommunication Networks</option><option value = "Telemetry & Data Acquisition System">Telemetry & Data Acquisition System</option><option value = "Thermal Science">Thermal Science</option><option value = "Utilization of Electrical Energy">Utilization of Electrical Energy</option><option value = "VLSI Design & its Applications">VLSI Design & its Applications</option>						</select><br>
						<input class="btn btn-primary active btn-lg" type= "submit" value = "Search"></input>
					</div>
				</form>		
			</div>
		</div>	
	</div>
	<div class="container">
				</div>
		<!--=======================================================================================All ads=================================================================================================================================================-->
			<div class="container">
								<div class="row">
									<div class="col-xs-1"></div>
									<div class="col-xs-10">
										<ul class = "nav nav-tabs">
											<li class = "active"><a data-toggle = "tab" href = "#Ads">Ads</a></li>
											<li><a href = "#Requests" data-toggle="tab">Requests</a></li>
										</ul>
										<div class = "tab-content">
											<div id = "Ads" class="tab-pane fade in active"><br>			<div class="panel panel-info">
													<div class="panel-heading">
															<h5 class="panel-title">
																<div class="row">
																	<div class="col-sm-8">
																		Physics 1
																	</div>
																	<div class="col-sm-4">
																		<span id="price_tag"> Rs. 180</span>
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
																	<p></p>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-4">
																	<p><strong><span id="detail_heading">Author</span></strong></p>
																</div>
																<div class="col-sm-8">
																	<p>H.C. Verma</p>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-4">
																	<p><strong><span id="detail_heading">Edition</span></strong></p>
																</div>
																<div class="col-sm-8">
																	<p>2008</p>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-4">
																	<p><strong><span id="detail_heading">Contact</span></strong></p>
																</div>
																<div class="col-sm-8">
																	<p>9891496927</p>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-4">
																	<p><strong><span id="detail_heading">Description</span></strong></p>
																</div>
																<div class="col-sm-8">
																	<p>A good book for practice and learning concepts.. :)</p>
																</div>
															</div>
														</div>
													</div>
										  		</div>
										  					</div>
		  									<div id ="Requests" class="tab-pane fade">		<div id ="posted_requests" >			<div class="panel panel-default">
				  												<div class = "panel-body"><br>
				  													<p><span class ="text-info"><u>saurabh :</u></span> user one second request for any book<br><span class = "text-muted small"> Posted on February 4, 2017 </span></p>
				  														<div class = "row">
				  																	  														
				  															<div class = "col-sm-1"></div>
					  														<div class = "col-sm-10">

					  																	<script type="text/javascript">
																							function post_comment2(){

																								var comment = comment_form2.Comment.value;
																								//alert(comment);
																								if(comment == ""){
																									alert("Please write some text to reply.");
																								}
																								var xmlhttp = new XMLHttpRequest();
																								xmlhttp.onreadystatechange = function() {
																									if (this.readyState == 4 && this.status == 200){
																										var replies = document.getElementById("replies_of_2");
																										replies.innerHTML = xmlhttp.responseText;
																									}
																								}
																								xmlhttp.open("GET", "post_comment.php?Comment="+comment+"&Parent_id=2", true);
																								xmlhttp.send();
																								comment_form2.Comment.value = "";
																							}
																						</script>
					  															
					  															<div id="replies_of_2">	<p><span class ="text-info"><u>saurabh :</u></span> having some errors :)
				  																						<br><span class = "text-muted small"> Posted on February 4, 2017 </span></p>	<p><span class ="text-info"><u>saurabh :</u></span> o thaari
				  																						<br><span class = "text-muted small"> Posted on February 4, 2017 </span></p></div>										</div>
					  														<div class = "col-sm-1"></div>	
					  													</div>
					  																			
				  												</div>
				  										</div>
			  											<div class="panel panel-default">
				  												<div class = "panel-body"><br>
				  													<p><span class ="text-info"><u>saurabh :</u></span> test comment by user 1<br><span class = "text-muted small"> Posted on February 4, 2017 </span></p>
				  														<div class = "row">
				  																	  														
				  															<div class = "col-sm-1"></div>
					  														<div class = "col-sm-10">

					  																	<script type="text/javascript">
																							function post_comment1(){

																								var comment = comment_form1.Comment.value;
																								//alert(comment);
																								if(comment == ""){
																									alert("Please write some text to reply.");
																								}
																								var xmlhttp = new XMLHttpRequest();
																								xmlhttp.onreadystatechange = function() {
																									if (this.readyState == 4 && this.status == 200){
																										var replies = document.getElementById("replies_of_1");
																										replies.innerHTML = xmlhttp.responseText;
																									}
																								}
																								xmlhttp.open("GET", "post_comment.php?Comment="+comment+"&Parent_id=1", true);
																								xmlhttp.send();
																								comment_form1.Comment.value = "";
																							}
																						</script>
					  															
					  															<div id="replies_of_1">	<p><span class ="text-info"><u>saurabh :</u></span> above was a request
				  																						<br><span class = "text-muted small"> Posted on February 4, 2017 </span></p>	<p><span class ="text-info"><u>saurabh :</u></span> what was thar
				  																						<br><span class = "text-muted small"> Posted on February 4, 2017 </span></p></div>										</div>
					  														<div class = "col-sm-1"></div>	
					  													</div>
					  																			
				  												</div>
				  										</div>
			  													</div>
		  									</div>
		  								</div>
		  						</div>
									<div class="col-xs-1"></div>
								</div>
							</div></body>
<br><br><footer>
By Saurabh Mishra...:)
</footer>
</html>