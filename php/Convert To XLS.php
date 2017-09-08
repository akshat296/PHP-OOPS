<?php
spl_autoload_register(function ($class)
{
	include_once("$class.php");
});
$Database=new Database(); 
include ("queryClass.php");

$obj=new queryClass();
$file=$obj->ConvertToXLS();
echo "File Downloading!";
$file=$obj->PDFGenerator($file);
//header('Location: ../res/database.xls');
//$obj->PDFGenerator($file);
//$pdf = new PDFmyURL ('yourlicensekey'); 

?>
