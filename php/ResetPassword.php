<?php session_start();
spl_autoload_register(function($class)
{
	include_once("$class.php");
});
include ("queryClass.php"); 

$password="";
$confirm_password="";	
$email;
$check;
$ForgotObj= new queryClass();
//echo "hello";
if(isset($_POST['submit']))
{
	
	$password             = $_POST['password']			;
	$confirm_password	  = $_POST['confirm_password'];
	$email 				  = $_POST['email'];
	
}

$Database 	 =new Database();
//$SignUpValidObj=new SignUpValidations();
//$pass=$SignUpValidations->password($password,$confirm_password);
if($password==$confirm_password && strlen($password)>3)
	 	{
	 		
			$check=$ForgotObj->updatepass($email,$password);
			if($check=="Updated Password")
			{
				echo "Updated Password";
			}
			else 
			{
				var_dump($email);
			echo "Error while Updating";
			}
	 	}	
	 	
else 
		{
	echo "password does not match: Error while Updating";
		}


?>