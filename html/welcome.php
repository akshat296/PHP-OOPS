<html>
<head>
		<link rel="stylesheet" type="text/css" href="../css/index.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		</script>
		
	<title>
			Welcome
	</title>

</head>
<body>
	<div class="box" ><center><p> Welcome <?php 
session_start();

	if(isset($_SESSION['username']))
	{
	echo "  ". $_SESSION['username'];


	}

	else 
{
	header("Location: ../html/Invalid User.php");
	 } ?></p></center>



	 <center>
	<br>
	<form action=<?php $email=$_GET['email']; echo "../php/Table.php?email=$email";?> method="post" >
	 <input name="search" type="text" placeholder="Search"><br><br>
	 <input name="Search" type="submit" value="Search">
	 </form>
	 <form action=<?php $email=$_GET['email']; echo "../php/pdfConvert.php?email=$email";?> method="post" >

	 <input name="Convert" type="submit" value="Convert">
	 </form></center>
	<center>
	<form action=<?php $email=$_GET['email']; echo "../php/MultipleUpload.php?email=$email";?> method="post" enctype="multipart/form-data">
  Send these files:<br />
  <input name="userfile[]" type="file" id="multiples" multiple >
   <label for="multiples">Multiple File upload</label><br/>
  
  <!--<input name="readfile" type="file" id="files">

  <label for="files">Choose a file file to read in text and xls</label><br/>-->
  <input name="database_csv_upload" type="file" id="database_csv">
   <label for="database_csv">Choose a file for inserting in db</label><br/>
  <input name="database_csv_update" type="file" id="database_update">
   <label for="database_update">Choose a file for Updating in db</label><br/>
  <!--<input name="readwritefile" type="file" id="files">
  <label for="files">Choose a file file to read and write in text and xls</label><br>-->
   <a href="../php/Convert To XLS.php" style = "color : black; "><input name="convertxls" type="button" id="files" value="Convert To XLS">
  <label for="files">Select to  convert database to xls</label><br><br></a>
  <input type="submit" value="Send files" />
	</form></center> 
	
	<center><a href="../html/logout.php">Logout</a></center> 
	 </div>

</body>
</html>
