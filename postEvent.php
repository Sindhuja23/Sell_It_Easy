<html>
	<head>
	<title>Post-an-Event</title>
		<link rel="stylesheet" type="text/css" href="CSS.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	<body id="postEventBody">
	<?php 
	session_start();
      if(!isset($_SESSION['logged_in'])) {
		   header("Location: SignIn.php"); 
	  } ?>
		<center>
		<a href="SignInSucess.php" style="float:left">Home</a>
		<a href="Logout.php" style="float:right">Logout</a>
		<h2 id="postEventH2"> Post an Event </h2>
		<form method="post" enctype="multipart/form-data">
		<table border="0">
			<tr><td><h1>Event Name:</h1></td><td>  <input type="text" name="EventName"/></td></tr>
			<tr><td><h1>Description:</h1></td><td><textarea name="Description"></textarea></td></tr>
			<tr><td><h1>Event Date:</h1></td><td><input type="date" name="EventDate"/></td></tr>
			<tr><td><h1>Ticket Cost:     </h1> </td><td><input type="number" name="Cost" min="0"/></td></tr>
			<tr><td><h1>Category:  </h1> </td><td> <select name="Category">
							<option value="Opera">Opera</option>
							<option value="Cinema and Theater">Cinema and Theater</option>
							<option value="Music Concert">Music Concert</option>
							<option value="Festival Celebration">Festival Celebration</option>
							<option value="Brithday">Birthday</option>
							<option value="Sports">Sports</option>
						</select></td></tr>
			<tr><td><h1>Phone number</h1></td><td><input name="PhoneNumber" type="tel" pattern="^\(\d{3}\)\d{3}-\d{4}$"  placeholder="(xxx)xxx-xxxx" required /></td></tr>
			<tr><td><h1>Address:</h1></td><td>   <input type="text" name="Address"/></td></tr>
		</table><br><br>
			<input type="submit" name="submit" value="Post Event" />
			<input type="reset" value="Clear"/>
		</form>
		</center>
		<?php
		
		if(isset($_POST['submit']) ){
			saveEvent();
			}
		function saveEvent(){
				$ItemName = $_POST["EventName"];
				$Description = $_POST["Description"];
				$Date = $_POST["EventDate"];
				$Cost = $_POST["Cost"];
				$Category = $_POST["Category"];
				$Phone = $_POST["PhoneNumber"];
				$Address = $_POST["Address"];
				$EventId = rand();
				session_start();
				$Username = $_SESSION["username"];
				
				$servername = "localhost";
				$username = "root";
				$password = "pr@sh@nth1@";

				mysql_connect($servername, $username, $password);
				mysql_select_db('cs687_teamproject');
				$qry="insert into event_details (Event_ID,Event_name,Username,Description,Event_date,Cost,category,Phone_Number,Address,Event_Flag) values ( '$EventId','$ItemName','$Username','$Description','$Date','$Cost','$Category','$Phone','$Address','1')";
				$result  = mysql_query($qry)or die("Upload Error " . mysql_errno().":" .mysql_error());
				if($result){
					echo '<script>alert("Event posted sucessfully!!");window.location = "SignInSucess.php";</script>';
					mysql_close();
					
				}
				echo "<script>alert('Action Failed!!<br>Please post Again');</script>";
			}
		
		?>
	</body>
</html>