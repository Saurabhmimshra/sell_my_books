<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- general stylesheet -->
<link rel="stylesheet" type="text/css" href="./general.css">
<!-- font faimily link (google fonts)-->
<link href="https://fonts.googleapis.com/css?family=Lobster|Noto+Serif|Ubuntu" rel="stylesheet">

<?php
  $conn_error = '<div class="alert alert-danger"><strong>Could not connect.</strong></div>';
  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $mysql_pass = '';
  $mysql_database = 'sellmybooks';

  mysql_connect($mysql_host, $mysql_user, $mysql_pass) || die($conn_error);
  mysql_select_db($mysql_database) || die($conn_error);
  
 ?>
