<?
	require 'connect.inc.php';
	require 'core.inc.php';

	if(isset($_GET['Request'])){
		$post = $_GET['Request'];
		$query = "INSERT INTO `requests` VALUES('','". $_SESSION['user_id'] ."','". time() ."','". mysql_real_escape_string($post) ."')";
		if ($result = mysql_query($query)) {
			echo '<form name = "request_form" method = "GET">
				  										<div class="form-group">
					  										<label for = "Request" ><h3>Request A Book</h3></label>
					  										<textarea name = "Request" id="Request" class="input-lg form-control" placeholder="Write Request" maxlength = "300" ></textarea>
				  										</div>
				  										<input class = "btn btn-default btn-lg " type = "button" value="Post" onclick="post_request()">
				  									</form>';
			 $query = "SELECT * FROM `requests` INNER JOIN `users` ON `users`.`id` = `requests`.`id` ORDER BY `r_id` DESC";
		  if($result = mysql_query($query)){
		  	while($row = mysql_fetch_assoc($result)){
		  		echo '										<div class="panel panel-default">
				  												<div class = "panel-body"><br>
				  													<p><span class ="text-info"><u>'. $row['name'] .' :</u></span>
					  													 '. $row['post'] .'<br>
					  													 <span class = "text-muted small"> Posted on '. date("F j, Y, g:i a",$row['time']) .' </span>
				  													</p>';
				$sql = "SELECT `users`.`name`, `requests`.`r_id`, `comments`.`time`, `comments`.`comment` FROM `users` INNER JOIN `comments` ON `users`.`id` = `comments`.`id` INNER JOIN `requests` ON `requests`.`r_id` = `comments`.`p_id` WHERE `comments`.`p_id` = '". $row['r_id'] ."' ORDER BY `c_id`";
				if ($run = mysql_query($sql)) {
					while($r = mysql_fetch_assoc($run)){
						echo '										<div class = "row">
				  														<div class = "col-sm-1"></div>
				  														<div class = "col-sm-10">
																			<div id="replies_of_'. $r['r_id'].'">
																				<p><span class ="text-info"><u>'. $r['name'] .' :</u></span>'. $r['comment'] .'<br>
																					<span class = "text-muted small"> Posted on '. date("F j, Y, g:i a", $r['time']) .'</span>
																				</p>
																			</div>					
																		</div>
					  													<div class = "col-sm-1"></div>	
					  												</div>';
					}
				}else{
					die($conn_error);
				}

				echo '											</div>
				  											</div>';
		  	}
		  }else{
		  	die($conn_error);
		  }
		}else echo mysql_error();
	}
?>