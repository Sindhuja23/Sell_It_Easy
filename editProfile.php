
<?php
$servername = "localhost";
$username = "root";
$password = "pr@sh@nth1@";
mysql_connect($servername, $username, $password);
mysql_select_db('cs687_teamproject');

$id = $_GET['id'];

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $Fname=$_POST["Fname"];
	$Lname=$_POST["Lname"];
	$Mname=$_POST["Mname"];
	$Email=$_POST["email"];
    
    // checking empty fields
    if(empty($Fname) || empty($Lname) || empty($Mname) || empty($Email)) {            
        if(empty($Fname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        } 
		if(empty($Lname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }	
		if(empty($Mname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }	
		if(empty($Email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }			
    } else {    
        
        mysql_query("UPDATE login_details SET F_Name='$Fname',L_Name='$Lname',M_Name='$Mname',Email_ID='$Email' WHERE Username = '$id'");
        
        echo '<script>window.location = "SignInSucess.php";</script>';
    }
}

?>

<?php

$result = mysql_query("SELECT * FROM login_details WHERE Username='$id'");
 
while($res = mysql_fetch_array($result))
{
    $Fname = $res["F_Name"];
    $Lname = $res["L_Name"];
    $Mname = $res["M_Name"];
    $Email = $res["Email_ID"];
}
?>
<html>
	<head>
		<title>Edit Profile</title>
 <link rel="stylesheet" type="text/css" href="CSS.css">	
	</head>
	<body id="editProfileBody">
	<?php 
	session_start();
      if(!isset($_SESSION['logged_in'])) {
		   header("Location: SignIn.php"); 
	  } ?>
		<div>
		 <a href="SignInSucess.php">Home</a> | &nbsp <a href= Logout.php>Log Out</a><br/><br/>
		 <h2 id="editProfileH2"> Edit Profile </h2>
		 <form name="form1" method="post" action="editProfile.php">
			<table border="0">
            <tr> 
                <td><h1 class="editProfileH1">First Name</h1></td>
                <td><input type="text" name="Fname" value="<?php echo $Fname;?>" required></td>
            </tr>
            <tr> 
                <td><h1 class="editProfileH1">Last name</h1></td>
                <td><input type="text" name="Lname" value="<?php echo $Lname;?>" required></td>
            </tr>
            <tr> 
                <td><h1 class="editProfileH1">Middle Name</h1></td>
                <td><input type="text" name="Mname" value="<?php echo $Mname;?>" required></td>
            </tr>
			<tr> 
                <td><h1 class="editProfileH1">E-mail ID:</h1></td>
                <td><input type="email" name="email" value="<?php echo $Email;?>" required></td>
            </tr>
            <tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
			</table>
		</form>
		 <form
		</div>
	</body>
</html>