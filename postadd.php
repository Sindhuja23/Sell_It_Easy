<html>
	<head><title>Post-an-Ad</title>
		<link rel="stylesheet" type="text/css" href="CSS.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	<body id="postAddBody">
	<?php 
		session_start();
      if(!isset($_SESSION['logged_in'])) {
		   header("Location: SignIn.php"); 
	  } ?>	
	<a href="SignInSucess.php" style="float:left">Home</a>
	<a href="Logout.php" style="float:right">Logout</a>
	<center>
		<h2 id="postAddH1"> Post an Advertisement </h2>
		<form method="post" enctype="multipart/form-data">
		<table border="0">
			<tr><td><h2 class="postAddH2">Item Name:</h2></td><td>  <input type="text" name="ItemName" required /></td></tr>
			<tr><td><h2 class="postAddH2">Condition:</h2></td><td><select name="condition">
							<option value="New">New</option>
							<option value="Used">Used</option>
						</select></td></tr>
			<tr><td><h2 class="postAddH2">Description:</h2></td><td><input type="text" name="Description" required/></td></tr>
			<tr><td><h2 class="postAddH2">Cost:      </h2> </td><td><input type="number" name="Cost" min="0" required/></td></tr>
			<tr><td><h2 class="postAddH2">Category: </h2> </td><td> <select name="Category[]" multiple="multiple">
							<option value="Books">Books</option>
							<option value="Electronics">Electronics & Computers</option>
							<option value="HealthBeauty">Beauty, Health & Food</option>
							<option value="HomeGarden">Home, Garden & Tools</option>
							<option value="Clothing">Clothing, Shoes & Jewelry</option>
							<option value="Sports">Sports & Outdoors</option>
							<option value="Automotive">Automotive & Industrial</option>
						</select></td></tr>
			<tr><td><h2 class="postAddH2">Phone number</h2></td><td><input name="PhoneNumber" type="tel" pattern="^\(\d{3}\)\d{3}-\d{4}$"  placeholder="(xxx)xxx-xxxx"  required /></td></tr>
			<tr><td><h2 class="postAddH2">Address: </h2></td><td>   <input type="text" name="Address" required/></td></tr>
			<tr><td><h2 class="postAddH2">Image (Max 8Mb): </h2></td> <td> <input type="file" name="image" required/></td></tr>
		</table><br><br>
			<input type="submit" name="sumit" value="Post Add" />
			<input type="reset" value="Clear"/>
		</form>
	</center>
		<?php
			if(isset($_POST['sumit']) && !empty($_POST['sumit'])){
			//echo "In php ";
				if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
					echo '<script>alert("Please select an Image.")';
				}
				else {
					
					$image=addslashes($_FILES['image']['tmp_name']);
					$name = addslashes($_FILES['image']['name']);
					$image= file_get_contents($image);
					//$image = base64_encode($image);
					saveimage($image,$name);
				}
			}
			
			function saveimage($name,$image){
				$ItemName = $_POST["ItemName"];
				$Description = $_POST["Description"];
				$Cost = $_POST["Cost"];
				//$Category = $_POST["Category"];
				$Category = implode("," , $_POST["Category"]);
				$Phone = $_POST["PhoneNumber"];
				$Address = $_POST["Address"];
				$Condition = $_POST["condition"];
				$ItemId = rand();
				$Username = $_SESSION["username"];
				
				$servername = "localhost";
				$username = "root";
				$password = "pr@sh@nth1@";

				mysql_connect($servername, $username, $password);
				mysql_select_db('cs687_teamproject');
				$qry="insert into item_details (Item_ID,Item_name,Username,Description,Cost,Category,Phone_Number,Address,Item_Image,Item_Flag,Item_Condition) values ( '$ItemId','$ItemName','$Username','$Description','$Cost','$Category','$Phone','$Address','$image','1','$Condition')";
				$result  = mysql_query($qry)or die("Upload Error " . mysql_errno().":" .mysql_error());
				if($result){
					echo '<script>alert("Add posted sucessfully");window.location = "SignInSucess.php";</script>';
					mysql_close();
					
				}
			}
		?>
	</body>
</html>