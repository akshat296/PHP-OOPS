<html>
<head>
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		</script>
		
	<title>
			Forgot Password
	</title>

</head>
<body>
	<div class="box" ><center><p> Change Password</p></center></div>
	
	<br>
	<form method="POST" action="../php/ResetPassword.php" id="centerform" > 
	<input type="text" 	   placeholder="Email" name="email" value="<?php echo $_GET['email']; ?>" 	class="textbox">
	<br><br>
	<input type="password" 	   placeholder="Password" name="password" value="" 	class="textbox">
	<br><br>
	<input type="password" 	   placeholder="Confirm Password" name="confirm_password" value="" 	class="textbox">
	<br><br>
	<a><input type="submit" value="Change Password" name='submit' class="button" size="35" ></a>
	
	
	</form>
	
</body>
</html>
