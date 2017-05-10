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
    
    // checking empty fields
    if(empty($name) || empty($Cost) || empty($Description) || empty($Phone) || empty($Addr)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($Cost)) {
            echo "<font color='red'>Cost field is empty.</font><br/>";
        }
        
        if(empty($Description)) {
            echo "<font color='red'>Description field is empty.</font><br/>";
        } 
        if(empty($Phone)) {
            echo "<font color='red'>Phone field is empty.</font><br/>";
        }        
        if(empty($Addr)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }        		
    } else {    
        
        mysql_query("UPDATE item_details SET Item_Name='$name',Cost='$Cost',Phone_Number='$Phone', Description='$Description', Address='$Addr' WHERE Item_ID= $id");
        
        echo '<script>window.location = "SignInSucess.php";</script>';
    }
}
?>
<?php

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM item_details WHERE Item_ID=$id");
 
while($res = mysql_fetch_array($result))
{
    $name = $res["Item_Name"];
    $Cost = $res["Cost"];
	$Description = $res["Description"];
	$Phone = $res["Phone_Number"];
	$Addr = $res["Address"];
	$Cond = $res["Item_Condition"];
}
?>
<html>
<head>    
    <title>Edit Ad</title>
 <link rel="stylesheet" type="text/css" href="CSS.css">	
</head>
 
<body id="editAddBody">
    <a href="SignInSucess.php" style="float:left">Home</a>
    <br/><br/>
    <h2 id="editAddH2"> Edit Advertisement</h2>
    <form name="form1" method="post" action="editAdd.php">
        <table border="0">
            <tr> 
                <td><h1 class="editAddH1">Name</h1></td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td><h1 class="editAddH1">Cost</h1></td>
                <td><input type="number" name="Cost" min="0" value="<?php echo $Cost;?>"></td>
            </tr>
            <tr> 
                <td><h1 class="editAddH1">Description</h1></td>
                <td><input type="text" name="Description" value="<?php echo $Description;?>"></td>
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