<?php
	//include("config.php");
	$servername = "localhost";
	$username = "root";
	$password = "pr@sh@nth1@";

	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	mysql_query("DELETE FROM wish_list WHERE ItemId = '$id' ");
	mysql_query("DELETE FROM item_details WHERE Item_ID = '$id' ");
	echo '<script>window.location = "SignInSucess.php";</script>';
?>