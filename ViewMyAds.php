<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<title>Sell-it-Easy | My Ads</title>
	<body>
	<div id="main">
		<h2 id="viewAdsH2">Welcome<?php
		session_start();
		$Person = $_SESSION['username']; 
		echo " " . $Person;
		?></h2>
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
		
		$result = mysql_query("SELECT * from item_details where Username = '$id'");
	?>
	<div id="viewAds"> 
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
            echo "<td><a href=\"editAdd.php?id=$res[Item_ID]\">Edit</a> | <a href=\"deleteAdd.php?id=$res[Item_ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";
		}
		
		?>
	</table>
	</div>
	</div>
	</body>
</html>

