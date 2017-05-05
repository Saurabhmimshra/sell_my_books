<?
	require 'connect.inc.php';
	require 'core.inc.php';

	if(isset($_GET['Request'])){
		$post = $_GET['Request'];
		 $query = "SELECT * FROM `requests` INNER JOIN `users` ON `users`.`id` = `requests`.`id` ORDER BY `r_id` DESC";
		  if($result = mysql_query($query)){
		  	while($row = mysql_fetch_assoc($result)){
		  		echo '										<div class="panel panel-default">
				  												<div class = "panel-body"><br>
				  													<p><span class ="text-info"><u>'. $row['name'] .' :</u></span>
					  													 '. $row['post'] .'<br>
					  													 <span class = "text-muted small"> Posted on '. date("F j, Y",$row['time']) .' </span>
				  													</p>';
				 echo '<script type="text/javascript" >	
									function post_comment'. $row['r_id'] .'(){
										var comment = comment_form'. $row['r_id'] .'.Comment.value;
										//alert(comment);
										if(comment == ""){
											alert("Please write some text to reply.");
										}
										var xmlhttp = new XMLHttpRequest();
										xmlhttp.onreadystatechange = function() {
											if (this.readyState == 4 && this.status == 200){
												var replies = document.getElementById("replies_of_'.$row['r_id'].'");
												replies.innerHTML = xmlhttp.responseText;
											}
										}
										xmlhttp.open("GET", "post_comment.php?Comment="+comment+"&Parent_id='. $row['r_id'] .'", true);
										xmlhttp.send();
										comment_form'. $row['r_id'] .'.Comment.value = "";
									}
								</script>';

				$sql = "SELECT `users`.`name`, `requests`.`r_id`, `comments`.`time`, `comments`.`comment` FROM `users` INNER JOIN `comments` ON `users`.`id` = `comments`.`id` INNER JOIN `requests` ON `requests`.`r_id` = `comments`.`p_id` WHERE `comments`.`p_id` = '". $row['r_id'] ."' ORDER BY `c_id`";
				if ($run = mysql_query($sql)) {
					
						echo '										<div class = "row">
				  														<div class = "col-sm-1"></div>
				  														<div class = "col-sm-10">
																			<div id="replies_of_'.$row['r_id'].'">';
						while($r = mysql_fetch_assoc($run)){	
									echo '										<p><span class ="text-info"><u>'. $r['name'] .' :</u></span>'. $r['comment'] .'<br>
																					<span class = "text-muted small"> Posted on '. date("F j, Y", $r['time']) .'</span>
																				</p>';
						}
							echo '												</div>					
																		</div>
					  													<div class = "col-sm-1"></div>	
					  												</div>';
					
					echo 	'		
																<div class = "row">
																		<div class = "col-sm-1"></div>
																		<div class = "col-sm-10">
																			<form name="comment_form'. $row['r_id'] .'"  method = "GET">
																				<p><span class="text-info"><u>'. $_SESSION['name'] .' :</u></span></p>
																				<textarea name = "Comment" id="Comment" maxlength="300" class = "form-control input-xs col-xs-6 " placeholder="Write a reply." ></textarea>
																				<input type = "button" class="btn btn-default btn-md" value="Reply" onclick ="post_comment'. $row['r_id'] .'()">
																			</form>
																		</div>
					  													<div class = "col-sm-1"></div>	
					  												</div>	
																		';
				}else{
					die($conn_error);
				}

				echo '											</div>
				  											</div>';
		  	}
		  }else{
		  	die($conn_error);
		  }
	}
?>