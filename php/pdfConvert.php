<!-- <html>
<body>
<table>
<tr>
<th>Photo</th>
<th>First_Name</th>
<th>Last_Name</th>
<th>Username</th>
<th>Email</th></tr> -->
<?php 
spl_autoload_register(function($class)
{
	include_once("$class.php");
}); 

include("pdf.php");
include ("queryClass.php");

$Database=new Database(); 
$obj=new queryClass();
$header=array('Photo','First_Name','Last_Name','Username','Email');
$data=array(array());

	
	$obj=new queryClass();
	$ar=$obj->getUserDetails("");
	for ($col=0,$i=0;$col<count($ar);$col++,$i++)
	{//echo "<tr>";
	for($row=1,$j=0;$row<(count($ar[$col])-2);$row++,$j++)
	{ 	
		//echo ($ar[$col][$row]."\t");
		if($row==1)
		{
			//echo "<td><img src=".$ar[$col][$row]." height=80 width=100 alt='No Image'></td>";
			$data[$i][$j]=$ar[$col][$row];
		}
		else
		{
		//echo "<td>".$ar[$col][$row]."\t"."</td>";
		$data[$i][$j]=$ar[$col][$row];
	}
	}
	//echo "</tr>";
	
	}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	//echo "</table>";

//var_dump($data);
	$pdf = new PDF($data);
// Column headings
// Data loading
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable();
//$pdf->AddPage();

$pdf->Output();
}
	?>		

