<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>




	<form method="POST" action="../php/SignupSaving.php" enctype="multipart/form-data">
	
	<table style="margin:0px auto; width:600px;">
	<tr>
					
					<td><p class="types"> Upload</p></td> 
					<td><input type="file" name="uploaded_file" value="" size="15"></td>
					<td><span class="error"><?php ?></span></td>
	</tr>		
	<tr>
					
					<td><p class="types"> First Name</p></td> 
					<td><input type="text" name="first_name" value="" size="33"></td>
					<td><span class="error"><?php ?></span></td>
	</tr>		
	<tr>
					<td><p class="types"> Last Name</p> </td>
					<td><input type="text" name="last_name" value="" size="33"></td>
					<td><span class="error"><?php ?></span></td>
	</tr>
	<tr>
					<td><p class="types"> Username </p> </td>
					<td><input type="text" name="username" value="" size="33"><span class="error"></td>
					<td><span class="error"><?php ?></span></td>
	</tr>
	<tr>	
					<td><p class="types"> E-mail</p> </td>
					<td><input type="text" name="email" value="" size="33"></td>
					<td><span class="error"><?php ?></span></td>
	</tr>	
	<tr>
					<td><p> Password</p> </td>
					<td><input type="password" name="password" value="" size="33"></td>
					<td><span class="error"><?php ?></span></td>
	</tr>
	
	<tr>				
					<td><p class="types">Confirm_Password</p> </td>
					<td><input type="password" name="confirm_password" value="" size="33"></td>
					<td></td>
	</tr>
	<br><br>
	<tr><td></td><td><input type="submit" name="submit" value="Submit" style="float:center;"></td></tr></table>
</form>





</body>
</html>

