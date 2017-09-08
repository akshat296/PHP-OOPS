<?php session_start();
spl_autoload_register(function($class)
{
	include_once("$class.php");
});
include ("queryClass.php");
$email="";	
//echo "hello";
if(isset($_POST['submit']))
{
	
	$email             = $_POST['email']			;
	
	
}

$Database 	 =new Database()						;
$ForgotObj= new queryClass();
$Last_Name=$ForgotObj->emailcheck($email);
var_dump($Last_Name);
if($Last_Name!="err")
{

header("Location: ../html/resetpassword.php?email=$email");

}
else
{
	echo "Email Not Found";
}

?>