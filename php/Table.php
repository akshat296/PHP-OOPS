
<html>
<body>
<table>
<tr>
<th>Photo</th>
<th>First_Name</th>
<th>Last_Name</th>
<th>Username</th>
<th>Email</th></tr>
<?php 
spl_autoload_register(function($class)
{
	include_once("$class.php");
}); 

include("pdf.php");
include ("queryClass.php");
$email=$_GET['email'];
$Database=new Database(); 
$pdfobj=new PDF();


if($_SERVER['REQUEST_METHOD']=="POST")
	
	{
	$UserSearch=$_POST['search'];
	$obj=new queryClass();
	$ar=$obj->getUserDetails($UserSearch);
	for ($col=0;$col<count($ar);$col++)
	{echo "<tr>";
	for($row=1;$row<(count($ar[$col])-2);$row++)
	{ 	
		//echo ($ar[$col][$row]."\t");
		if($row==1)
		{
			echo "<td><img src=".$ar[$col][$row]." height=80 width=100 alt='No Image'></td>";
		}
		else
		{
		echo "<td>".$ar[$col][$row]."\t"."</td>";
	}
	}
	echo "</tr>";
	
	}
	echo "</table>";
	}		

