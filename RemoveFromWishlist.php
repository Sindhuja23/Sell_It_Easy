<?php
	$servername = "localhost";
	$username = "root";
	$password = "pr@sh@nth1@";
	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	session_start();
	$Username = $_SESSION['username'];
	mysql_query("DELETE FROM Wish_List WHERE ItemId = '$id' and Username= '$Username'") ;
	echo "<script>window.location = 'Wishlist.php?';</script>"
?>