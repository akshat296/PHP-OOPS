<?php 
spl_autoload_register(function($class)
{
	include_once("$class.php");
});
include ("queryClass.php");
$email=$_GET['email'];
$Database=new Database(); 
//var_dump($email);
if($_SERVER['REQUEST_METHOD']=="POST")

	{		$i=0;
		$obj=new queryClass();

	$imgcheck="err";
	while (@$_FILES["userfile"]['name'][$i]!='')
	{

		//echo $_FILES["userfile"]['name'][$i];
		
		 move_uploaded_file($_FILES['userfile']['tmp_name'][$i], "../img/{$_FILES['userfile']['name'][$i]}");
		  $url="../img/{$_FILES['userfile']['name'][$i]}";
				   
		 $i++;
		 	echo "<br>";
		 	//var_dump($url);
		 	
		 	
		 	echo "<br>";
		 $imgcheck=$obj->SavingPictures($email, $url);

	}
	if($imgcheck!="err")
	{
			echo "Updated Image";
	}
	
	if(@$_FILES['readfile']['name']!='')
	{
		$type=$obj->checkfile($_FILES['readfile']['type']);
		if($type!="err")
		{	

			echo "<br>";
			move_uploaded_file($_FILES['readfile']['tmp_name'],"../res/{$_FILES['readfile']['name']}");
			$file=fopen("../res/{$_FILES['readfile']['name']}","r");
			$checkfile=$obj->FileUpload($email,fread($file,$_FILES['readfile']['size']));

			if($checkfile!="err")
			{
				//echo "Updated";
			}
			else 
			{
				echo "Error";
			}
			echo $checkfile=$obj->ShowFile($email);
			fclose($file);

		}
	}
	if(@$_FILES['readwritefile']['name']!='')
	{
		$type=$obj->checkfile($_FILES['readwritefile']['type']);
		//var_dump($type);
		if($type!="err")
		{	

			
			$file=fopen($_FILES['readwritefile']['tmp_name'],"a");
			echo fread($file,$_FILES['readwritefile']['size']);
			$text="I'm writing via a variable";
			echo "ok";
			fwrite($file, $text);
			echo "<br><br>";
			echo fread($file,$_FILES['readwritefile']['size']);
			fclose($file);

		}
	}
	if($_FILES['database_csv_upload']['name']!='')
	{
		$type=$obj->checkfile($_FILES['database_csv_upload']['type']);
		if($type!="err")
		{
			$file=fopen($_FILES['database_csv_upload']['tmp_name'], "r");
			$ar=array();
			while ($r=fgetcsv($file))
			{
				array_push($ar, $r);
			}
			$a="";
			move_uploaded_file($_FILES['database_csv_upload']['tmp_name'],"../res/{$_FILES['database_csv_upload']['name']}");
			
			foreach($ar as $key=>$value)
			{

				$a= $obj->insertTable($value);
				
			}
			if($a=="Inserted")
				{
					echo "Successfully Inserted";
				}
			fclose($file);
		}

	}
	if($_FILES['database_csv_update']['name']!='')
	{
	$type=$obj->checkfile($_FILES['database_csv_update']['type']);
		if($type!="err")
		{
		
		$file=fopen($_FILES['database_csv_update']['tmp_name'], "r");
		$ar=array();//multi
		$ar_old=$obj->fetchall(); //multi
			while ($r=fgetcsv($file))
			{
				array_push($ar, $r);
			}

			$cells=0;
			for ($col=0;$col<count($ar_old);$col++)
				{
			for($row=0;$row<count($ar_old[$col]);$row++)
			{ 	
			if ((@$ar_old[$col][$row+1]!=@$ar[$col][$row]))
			{
				$update=$obj->update(@$ar[$col],@(int) $ar_old[$col][0]);
				if($update!="err")
				{
					$cells++;
				}
				
			}
			}
		}
		if($cells>0)
		{
			echo "<br> CSV File Updated in Database";
			echo "<br> $cells cells were not equal in database";
		}
			
	fclose($file);
	}
	
	}
}
		



?>