<?
	require 'connect.inc.php';
	require 'core.inc.php';

	$comment = $_GET['Comment'];
	$pid = $_GET['Parent_id'];

	if(!empty($comment) && !empty($pid)){
		$query = "INSERT INTO `comments` VALUES('','".$_SESSION['user_id']."','". mysql_real_escape_string($pid) ."','". time() ."','". mysql_real_escape_string($comment) ."')";
		if ($result = mysql_query($query)) {
							$sql = "SELECT `users`.`name`, `requests`.`r_id`, `comments`.`time`, `comments`.`comment` FROM `users` INNER JOIN `comments` ON `users`.`id` = `comments`.`id` INNER JOIN `requests` ON `requests`.`r_id` = `comments`.`p_id` WHERE `comments`.`p_id` = '". $pid ."' ORDER BY `c_id`";

							if ($run = mysql_query($sql)) {
								while($r = mysql_fetch_assoc($run)){	
									echo '	<p><span class ="text-info"><u>'. $r['name'] .' :</u></span>'. $r['comment'] .'<br>
												<span class = "text-muted small"> Posted on '. date("F j, Y", $r['time']) .'</span>
											</p>';
						}
							}else die($conn_error);

		}else die($conn_error);
	}
	
?>