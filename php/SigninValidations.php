<?php
session_start();
spl_autoload_register(function($class)
{
	include_once("$class.php");
});

$email="";	$password="";

//echo "hello";
if(isset($_POST['submit']))
{
	echo "hello2";
	$email             = $_POST['email']			;
	echo $_POST['email']   							;
	$password 		   = $_POST['password']			;
	
}

$Database 	 =new Database()						;
$SignInObj= new SignIn($email,$password);
$username=$SignInObj->checkDetails();
var_dump($username);
if($username!="err")
{
$_SESSION['username']=$username;
header("Location: ../html/welcome.php?email=$email");

}
else
{
	//header("Location: ../html/logout.php");
}
class SignIn
{

private $email;
private $password;
private $db;
	
	function __construct($email,$password)
	{
		global $Database;
		$this->db 		=	&$Database	;
		$this->email 	=	$email		;
		$this->password =	$password	;
	}

	function checkDetails()
	{
		$this->password=md5($this->password);
		$stmt 	=$this->db->prepare("Select Username from users where (Email = :email AND Password = :password )");
			$stmt->execute(array(':email'=>$this->email,':password'=>$this->password));
			if($stmt->rowCount()!=0)
			{
				return $stmt->fetch()['Username'];
			}
			else 
			{
				return "err";
			}
		
	}
}