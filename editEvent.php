<?php
$servername = "localhost";
$username = "root";
$password = "pr@sh@nth1@";
mysql_connect($servername, $username, $password);
mysql_select_db('cs687_teamproject');

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $Cost=$_POST['Cost'];
    $Description=$_POST['Description'];
    $Phone=$_POST['Phone'];
    $Addr=$_POST['Address'];    
	$Date = date("Y-m-d",strtotime($_POST["Event_Date"]));
           
    mysql_query("UPDATE event_details SET Event_name='$name',Cost='$Cost',Phone_Number='$Phone', Description='$Description', Address='$Addr',Event_date='$Date' WHERE Event_ID= $id");
        
    echo '<script>window.location = "SignInSucess.php";</script>';
}
?>
<?php

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM event_details WHERE Event_ID=$id");
 
while($res = mysql_fetch_array($result))
{
    $name = $res["Event_name"];
    $Cost = $res["Cost"];
	$Description = $res["Description"];
	$Date = date("Y-m-d",strtotime($res["Event_date"]));
	$Phone = $res["Phone_Number"];
	$Addr = $res["Address"];
}
?>
<html>
<head>    
    <title>Edit Event</title>
	<link rel="stylesheet" type="text/css" href="CSS.css">
</head>
 
<body>
    <a href="SignInSucess.php" style="float:left">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editEvent.php">
        <table border="0">
            <tr> 
                <td><h1 class="editAddH1">Name</h1></td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
			<tr> 
                <td><h1 class="editAddH1">Description</h1></td>
                <td><input type="text" name="Description" value="<?php echo $Description;?>"></td>
            </tr>
            <tr> 
                <td><h1 class="editAddH1">Cost</h1></td>
                <td><input type="number" name="Cost" min="0" value="<?php echo $Cost;?>"></td>
            </tr>
			<tr>
				<td><h1 class="editAddH1">Event Date:</h1></td>
				<td><input type="date" name="Event_Date" value="<?php echo $Date?>"/>
				</td>
			</tr>
			<tr> 
                <td><h1 class="editAddH1">Phone Number</h1></td>
                <td><input name="Phone" type="tel" pattern="^\(\d{3}\)\d{3}-\d{4}$"  placeholder="(xxx)xxx-xxxx" value="<?php echo $Phone;?>" required /></td>
            </tr>
			<tr> 
                <td><h1 class="editAddH1">Address</h1></td>
                <td><input type="text" name="Address" value="<?php echo $Addr;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>