<?php
	$servername = "localhost";
	$username = "root";
	$password = "pr@sh@nth1@";

	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	session_start();
	$Username = $_SESSION['username'];
	mysql_query("INSERT INTO Wish_List (Username,ItemId) VALUES ('$Username','$id')") ;
	echo "<script>window.location = 'SignInSucess.php?';</script>";
?>