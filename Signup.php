<!DOCTYPE html>
<html>

    <head>
    <link rel="stylesheet" type="text/css" href="CSS.css">
        <title>Signup</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script>
	  
	 function Reset(){
		document.getElementById("SignUpForm").reset(); 
	 }
	 function checkPassword()
	{
		var Password = document.forms["SignUpForm"]["password"].value;
		// at least one number, one lowercase and one uppercase letter
		// at least six characters that are letters, numbers or the underscore
		var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
		if(re.test(Password)){
			
			if ($('#passwordfield').val() == $('#confirm_password').val()) {
				return re.test(Password);
			} else{
				$('#message').html('Passwords do not match!!').css('color', 'red');
				setTimeout(function () {$('#message').html(' ').css('color', 'red');}, 2000)
				Reset();
				return false;	
			} 
				
			
		}
		else{
			alert ("Invalid Password: Password should be atleast 6 characters long and contain at least one number, one lowercase and one uppercase letter");
			return re.test(Password);
			Reset();
		}
	}

	</script>
	<link rel="stylesheet" type="text/css" href="Css.css">
	</head>
    <body> 
     <div class="">
      <a href="welcome.html" class="">Home |</a>
	  <a href="SignIn.php"> Sign-In</a><div  style="float:right">
      <a href="about.html">About |</a>
      <a href="contact.html">Contact</a></div>
    </div>
    <center><h1 id="SignupH1">SELL-IT-EASY</h1><br><br><br><br><br>
        <form name="SignUpForm" action="processSignUp.php" onsubmit="return checkPassword()" method="post" id="SignUpForm">
		<h2 id="SignupH2">
         Firstname:<input type="text" name="Fname" required><br><br>
         Lastname:<input type="text" name="Lname" required><br><br>
		 Email ID:<input type="email" name="email" required placeholder="Please enter valid E-mail"><br><br>
		 Username:<input type="text" name="username" required><br><br>
		 Password:<input id="passwordfield" type="password" name="password" required><br><br>
		 Confirm Password :<input type="password" name="Confirmpassword" id="confirm_password"/><span id='message'></span><br><br> 
         <input type="submit" value="Sign Up">
		 <input type="button" value="Clear" onclick="Reset()"></h2></center>
        </form>
    </body>
</html>
		  
           