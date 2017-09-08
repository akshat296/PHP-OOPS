<html>
<head>
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		</script>
		
	<title>
			Sign In
	</title>

</head>
<body>
	<div class="box" ><center><p> Welcome to Web</p></center></div>
	<center><h1 id="heading">Login</h1></center>
	<br>
	<form method="POST" action="../php/SigninValidations.php" id="centerform" > 
	<input type="text" 	   placeholder="Email" name="email" value="" 	class="textbox">
	<br><br>
	<input type="password" placeholder="Password" name="password" value="" class="textbox">
	<br><br>
	<a href="../html/forgotpass.php">Forgot Password?</a>
	<br><br>
	<a href="../html/purereset.php">Reset Password</a>
	<br><br>
	
	<a><input type="submit" value="Login" name='submit' class="button" ></a>
	
	
	</form>
	<center><a href="../html/signup.php"><button class="button" > Sign Up</button></a></center>
</body>
</html>
