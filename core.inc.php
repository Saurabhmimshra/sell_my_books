<?php

	ob_start();
	session_start();
	$current_file = $_SERVER['SCRIPT_NAME'];
	@$prev_page = $_SERVER['HTTP_REFERER'];

	function is_logged_in(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			return true;
		}
		return false;
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>