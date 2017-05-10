<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<title>Sell-it-Easy | Wishlist</title>
	<body>
	<div id="main">
		<h3>Welcome<?php
		session_start();
		$Person = $_SESSION['username']; 
		echo " " . $Person;
		?></h3>
		<div style="float:left"><a href= SignInSucess.php>Home</a></div>
		<div style="float:right"> <a href= Logout.php>Log Out</a></div>
		<br><br>
	
	<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "pr@sh@nth1@";
		mysql_connect($servername, $username, $password);
		mysql_select_db('cs687_teamproject');
		
		$id = $_GET['id'];
		
		$result = mysql_query("SELECT * from item_details, wish_list where item_details.Item_ID = wish_list.ItemId and wish_list.Username = '$id'");
	?>
	<div id="viewWishlist"> 
	All Ads: 
	<table border=0>
		<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Description</td>
		<td>Cost</td>
		<td>Category</td>
		<td>Condition</td>
		<td>Phone Number</td>
		<td>Address</td>
		<td>Image</td>
		<td>Action</td>
		</tr>
		<?php
		
		while($res = mysql_fetch_array($result)){
			echo '<tr>';
            echo '<td>'.$res["Item_Name"].'</td>';
            echo '<td>'.$res["Description"].'</td>';
            echo '<td>'.$res["Cost"].'</td>';    
            echo '<td>'.$res["Category"].'</td>';    
            echo '<td>'.$res["Item_Condition"].'</td>';    
            echo '<td>'.$res["Phone_Number"].'</td>';    
            echo '<td>'.$res["Address"].'</td>';    
            echo '<td><img src="data:image/jpeg;base64,'.base64_encode($res["Item_Image"]).'" alt="Error loading Image"/></td>  ';    
            echo "<td><a href=\"RemoveFromWishlist.php?id=$res[Item_ID]\">Remove</a></td></tr>";
		}
		
		?>
	</table>
	</div>
	</div>
	</body>
</html>