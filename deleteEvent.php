<?php	
	$servername = "localhost";
	$username = "root";
	$password = "pr@sh@nth1@";

	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	mysql_query("DELETE FROM Event_details WHERE Event_ID = '$id' ") ;
	echo '<script>window.location = "SignInSucess.php";</script>';
?>	