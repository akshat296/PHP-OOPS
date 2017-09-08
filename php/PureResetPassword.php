<?php 
session_start();
spl_autoload_register(function($class)
{
	include_once("$class.php");
});
include ("queryClass.php");
$email="";	
$oldpass;
$newpass;
$confirmnewpass;
//echo "hello";
if(isset($_POST['submit']))
{
	
	$email             = $_POST['email']				;
	$oldpass		   = $_POST['old_password']			;	 
	$newpass		   = $_POST['password']				;	 
	$confirmnewpass	   = $_POST['confirm_password']		;	 
	
}

$Database 	 =new Database()						;
$ForgotObj= new queryClass();
$passcheck=$ForgotObj->oldpasscheck($email,$oldpass);
var_dump($passcheck);
if($passcheck!="err")
{

//header("Location: ../html/resetpassword.php?email=$email");
	$check=$ForgotObj->matchPassword($newpass,$confirmnewpass);
	if($check!="err")
	{
		$update=$ForgotObj->updatepass($email,$newpass);
		if($update!="err")
		{
			echo "Success";

		}
		else {
			echo "cannot update";
		}
	}
	else 
	{
		echo "password does not match";
	}


}
else
{
	echo "Old Passowrd does not match";
}
?>